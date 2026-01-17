<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Lead;
use App\Mail\OtpMail;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Public pages
|--------------------------------------------------------------------------
*/

Route::view('/', 'pages.home')->name('home');
Route::view('/approach', 'pages.approach')->name('approach');
Route::view('/systems', 'pages.systems')->name('systems');
Route::view('/how-it-works', 'pages.how-it-works')->name('how-it-works');
Route::view('/why-blackpeach', 'pages.why')->name('why');

Route::view('/contact', 'pages.contact')->name('contact');
Route::post('/contact', [ContactController::class, 'store'])
    ->name('public.contact.store');

Route::view('/privacy', 'pages.privacy')->name('privacy');
Route::view('/terms', 'pages.terms')->name('terms');

/*
|--------------------------------------------------------------------------
| Public Lead Flow (token-based, no closures, no DB in routes)
|--------------------------------------------------------------------------
*/

//Route::view('/confirm/{token}', 'pages.confirm')->name('public.confirm');

Route::get('/confirm/{token}', function (string $token) {
    $lead = Lead::where('public_token', $token)->firstOrFail();

    return view('pages.confirm', [
        'token' => $token,
        'lead'  => $lead,
    ]);
})->name('public.confirm');


Route::view('/thankyou', 'pages.thankyou')->name('public.thankyou');

/*
|--------------------------------------------------------------------------
| Admin Authentication (2-step: credentials → OTP)
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

    if (! $user || ! Hash::check($request->password, $user->password)) {
        return back()
            ->withErrors(['email' => 'Invalid credentials'])
            ->withInput();
    }

    $otp = strtoupper(str()->random(6));

    Mail::to($user->email)->send(new OtpMail($otp));

    cache()->put("otp:{$user->id}", [
        'code'       => $otp,
        'expires_at' => now()->addMinutes(3),
    ], now()->addMinutes(3));

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
| RESEND OTP
|--------------------------------------------------------------------------
*/

Route::post('/login/otp/resend', function () {
    $userId = session('otp_user_id');

    if (! $userId) {
        return redirect()->route('login');
    }

    $user = User::findOrFail($userId);

    $otp = strtoupper(str()->random(6));

    cache()->put("otp:{$userId}", [
        'code'       => $otp,
        'expires_at' => now()->addMinutes(3),
    ], now()->addMinutes(3));

    Mail::to($user->email)->send(new OtpMail($otp));

    return back()->with('message', 'New OTP sent to your email');
})->name('otp.resend');

/*
|--------------------------------------------------------------------------
| Logout
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
| Admin area (protected)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', \App\Http\Controllers\Admin\AdminController::class)
            ->name('dashboard');

        Route::resource('leads', \App\Http\Controllers\Admin\LeadsController::class);
        Route::resource('projects', \App\Http\Controllers\Admin\ProjectsController::class);
        Route::resource('documents', \App\Http\Controllers\Admin\DocumentsController::class);
        Route::resource('statements', \App\Http\Controllers\Admin\StatementsController::class);
        Route::resource('subscriptions', \App\Http\Controllers\Admin\SubscriptionsController::class);
    });
