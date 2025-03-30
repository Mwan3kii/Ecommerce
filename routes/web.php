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

// Test examples

Route::get('/test',function(){   return ("Hello !!");})->name('test');

Route::get('/myc',[MyTestController::class,'Myindex']);


Route::get('/myview',function(){ return view('myview'); } );

Route::get('/getData',[MyTestController::class,'MyCoolFunction']);

Route::get('/testUsers',[MyTestController::class,'testusersFx']);

// Eccomerce project

Route::get('/landing-page', function () {
    return view('landing');
});

Route::get('/register', function () {
    return view('livewire.auth.register');
});


require __DIR__.'/auth.php';
