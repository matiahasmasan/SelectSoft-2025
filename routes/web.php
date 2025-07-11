<?php

use App\Http\Integrations\SpringBoot\SpringBootInstanceConnector;
use App\Http\Middleware\EnsureUserLoggedIn;
use App\Livewire\Dashboard;
use App\Livewire\Users;
use App\Livewire\Roles;
use App\Livewire\Permissions;
use App\Mail\AccountCreated;
use App\Utils\ChartBuilder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::redirect('/', 'dashboard');

// Route::get('/', function () {
//     Session::invalidate();
//     return view('welcome');
// })->name('home');


Route::middleware(['auth', EnsureUserLoggedIn::class])->group(function () {

    Route::get('dashboard', Dashboard::class)->name('dashboard');
    // rute noi
    Route::get('users', Users::class)->name('users');
    Route::get('roles', Roles::class)->name('roles');
    Route::get('permissions', Permissions::class)->name('permissions');    

    Route::redirect('settings', 'settings/password')->name('settings');

    // Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

    
});

require __DIR__ . '/auth.php';
