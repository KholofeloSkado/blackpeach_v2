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
