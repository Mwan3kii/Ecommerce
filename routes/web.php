<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

use App\Http\Controllers\MyTestController;



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

Route::get('/test',function(){   return ("Hello !!");})->name('landing');

Route::get('/myc',[MyTestController::class,'Myindex']);


Route::get('/myview',function(){ return view('myview'); } );

Route::get('/getData',[MyTestController::class,'MyCoolFunction']);

Route::get('/testUsers',[MyTestController::class,'testusersFx']);








require __DIR__.'/auth.php';
