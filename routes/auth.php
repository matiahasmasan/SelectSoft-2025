<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::middleware('guest')->group(function () {
    Volt::route('login', 'auth.login')
        ->name('login');

    Volt::route('register', 'auth.register')
        ->middleware('internal.password')
        ->name('register');

    Volt::route('confirm-password-internal', 'auth.confirm-password-internal')
        ->name('password.internal');

    // TODO: ulterior - trebuie de gasit o solutie pentru tokenii de resetare a parolei
    // Volt::route('forgot-password', 'auth.forgot-password')
    //     ->name('password.request');

    // Volt::route('reset-password/{token}', 'auth.reset-password')
    //     ->name('password.reset');
});
// RUTA BUTON DASHBOARD
/* 
Route::middleware(['auth', 'can:create,App\\Models\\User'])->group(function () {
    Volt::route('register', 'auth.register')
        ->name('register');
});
*/

Route::middleware('auth')->group(function () {
    // Volt::route('verify-email', 'auth.verify-email')
    //     ->name('verification.notice');

    // Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
    //     ->middleware(['signed', 'throttle:6,1'])
    //     ->name('verification.verify');

    // Volt::route('confirm-password', 'auth.confirm-password')
    //     ->name('password.confirm');
});

Route::post('logout', App\Livewire\Actions\Logout::class)
    ->name('logout');
