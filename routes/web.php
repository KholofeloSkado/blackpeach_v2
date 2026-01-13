<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Mail\OtpMail;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Public pages
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', function () {
    return view('contact');
})->name('public.contact');

Route::get('/pricing', function () {
    return view('pricing');
})->name('public.pricing');

Route::get('/confirm/{lead_id}', function ($lead_id) {
    return view('confirm', compact('lead_id'));
})->name('public.confirm');

Route::get('/thankyou/{lead_id}', function ($lead_id) {
    return view('thankyou', compact('lead_id'));
})->name('public.thankyou');

/*
|--------------------------------------------------------------------------
| Admin Authentication (2‑step: credentials → OTP)
|--------------------------------------------------------------------------
*/

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (Request $request) {
    $request->validate([
        'email'    => ['required', 'string', 'email'],
        'password' => ['required', 'string', 'min:8'],
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! \Hash::check($request->password, $user->password)) {
        return back()
            ->withErrors(['email' => 'Invalid credentials'])
            ->withInput();
    }

    // Generate 6‑character alphanumeric OTP
    $otp = strtoupper(str()->random(6));

    // ✅ PRODUCTION: Send real email
    Mail::to($user->email)->send(new OtpMail($otp));

    // Store OTP & expiry for 3 minutes
    cache()->put("otp:{$user->id}", [
        'code'       => $otp,
        'expires_at' => now()->addMinutes(3),
    ], now()->addMinutes(3));

    // Mark user as pending OTP (REMOVED DUPLICATE)
    session(['otp_user_id' => $user->id]);

    return redirect()->route('otp.show');
})->name('login.handle');

Route::get('/login/otp', function () {
    if (! session('otp_user_id')) {
        abort(403, 'No pending login');
    }
    return view('auth.otp');
})->name('otp.show');

Route::post('/login/otp', function (Request $request) {
    $request->validate([
        'otp' => ['required', 'string', 'size:6'],
    ]);

    $userId = session('otp_user_id');
    if (! $userId) {
        abort(403, 'No pending login');
    }

    $data = cache()->get("otp:{$userId}");

    if (! $data || now()->greaterThan($data['expires_at'])) {
        return back()
            ->withErrors(['otp' => 'Code expired, please login again'])
            ->withInput();
    }

    if (strtoupper($request->otp) !== $data['code']) {
        return back()
            ->withErrors(['otp' => 'Invalid code'])
            ->withInput();
    }

    cache()->forget("otp:{$userId}");
    session()->forget('otp_user_id');

    $user = User::findOrFail($userId);
    Auth::login($user);

    return redirect()->route('admin.dashboard');
})->name('otp.handle');

/*
|--------------------------------------------------------------------------
| RESEND OTP (Production)
|--------------------------------------------------------------------------
*/

Route::post('/login/otp/resend', function (Request $request) {
    $userId = session('otp_user_id');
    if (! $userId) {
        return redirect()->route('login');
    }

    $user = User::findOrFail($userId);
    $otp = strtoupper(str()->random(6));

    cache()->put("otp:{$userId}", [
        'code' => $otp,
        'expires_at' => now()->addMinutes(3),
    ], now()->addMinutes(3));

    Mail::to($user->email)->send(new OtpMail($otp));

    return back()->with('message', 'New OTP sent to your email');
})->name('otp.resend');

/*
|--------------------------------------------------------------------------
| Logout Route
|--------------------------------------------------------------------------
*/

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

/*
|--------------------------------------------------------------------------
| Admin area (protected) - ALL CLIENT DATA CENTRALIZED
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', \App\Http\Controllers\Admin\AdminController::class)
            ->name('dashboard');

        Route::resource('leads', \App\Http\Controllers\Admin\LeadsController::class);
        
        // FUTURE: Projects, Documents, Statements, Subscriptions
        Route::resource('projects', \App\Http\Controllers\Admin\ProjectsController::class);
        Route::resource('documents', \App\Http\Controllers\Admin\DocumentsController::class);
        Route::resource('statements', \App\Http\Controllers\Admin\StatementsController::class);
        Route::resource('subscriptions', \App\Http\Controllers\Admin\SubscriptionsController::class);
    });

// PRODUCTION: Remove debug route
// Route::get('/debug-admin', ...);
