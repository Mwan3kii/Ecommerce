<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

use App\Http\Controllers\MyTestController;
use App\Http\Controllers\UserController;



Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});
//GET, POST PUT DEL 

Route::get('/landing-page', function () {
    return view('landing');
});

Route::get('/register', function () {
    return view('livewire.auth.register');
});

Route::get('/login', function () {
    return view('livewire.auth.login');
});

Route::get('/logout', function () {
    return view('livewire.auth.login');
});


require __DIR__.'/auth.php';
