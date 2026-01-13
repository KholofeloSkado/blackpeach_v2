<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// ✅ WORKING Livewire v3 + Laravel 11 - Blade Directive Method
Route::get('/contact', function () {
    return view('contact');
})->name('public.contact');

Route::get('/pricing', function () {
    return view('pricing');
})->name('public.pricing');


// ✅ FIXED: Confirmation page (Blade + @livewire)
Route::get('/confirm/{lead_id}', function ($lead_id) {
    return view('confirm', compact('lead_id'));
})->name('public.confirm');

Route::get('/thankyou/{lead_id}', function ($lead_id) {
    return view('thankyou', compact('lead_id'));
})->name('public.thankyou');

