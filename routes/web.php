<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogsContoller;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CoffeeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/coffee', [CoffeeController::class, 'index'])->name('coffee');
Route::get('/blog', [BlogsContoller::class, 'index'])->name('blog');


Route::get('/contact', action: function () {
    return view('contact');
})->name('contact');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');


Route::get('/login', [AuthController::class, 'index'])->name('login.index');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('/register', [AuthController::class, 'register_index'])->name('register.index');
Route::post('/register', [AuthController::class, 'register'])->name('register');




Route::prefix('admin')->group(function () {
    Route::get('/coffee', [CoffeeController::class, 'admin_index'])->name('admin.coffee.index');
    Route::get('/coffee/create', [CoffeeController::class, 'create_index'])->name('admin.coffee.create');
    Route::post('/coffee/create', [CoffeeController::class, 'create'])->name('admin.coffee.create');
    Route::get('/coffee/{id}/edit', [CoffeeController::class, 'edit'])->name('admin.coffee.edit');
    Route::delete('/coffee/{id}', [CoffeeController::class, 'destroy'])->name('admin.coffee.destroy');
});


Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add/{coffeeId}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/update/{id}', [CartController::class, 'updateQuantity'])->name('cart.update');
    Route::post('/increase/{id}', [CartController::class, 'increaseQuantity'])->name('cart.increase');
    Route::post('/decrease/{id}', [CartController::class, 'decreaseQuantity'])->name('cart.decrease');
    Route::delete('/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/checkout', [CheckoutController::class, 'checkout'])->name('cart.checkout');

});


// Route::post('/midtrans/callback', [CheckoutController::class, 'callback']);
