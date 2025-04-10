<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

use App\Http\Controllers\MyTestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;


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

// Auth
Route::get('/register', function () {
    return view('livewire.auth.register');
});

Route::get('/login', function () {
    return view('livewire.auth.login');
});

Route::get('/logout', function () {
    return view('livewire.auth.login');
});

// Products
Route::get('/create-product', function () {
    return view('create_product');
});

Route::get('/products', [ProductController::class, 'showProducts']);
Route::get('/single-product/{id}', [ProductController::class, 'showSingleProduct']);
Route::post('/create-product', [ProductController::class, 'createProduct']);

// Cart
Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart']);
Route::get('/remove-cart/{id}', [CartController::class, 'removeFromCart']);

Route::get('/clear-cart', [CartController::class, 'clearCart']);
Route::get('checkout', function () {
    return view('checkout');
});


require __DIR__.'/auth.php';
