<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
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
Route::get('/blog', [BlogController::class, 'index'])->name('blog');


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
    Route::get('/coffee/search', [CoffeeController::class, 'search'])->name('admin.coffee.search');
    Route::get('/coffee/create', [CoffeeController::class, 'create_index'])->name('admin.coffee.create');
    Route::post('/coffee/create', [CoffeeController::class, 'create'])->name('admin.coffee.create');
  Route::get('/coffee/{id}/edit', [CoffeeController::class, 'edit'])->name('admin.coffee.edit');
    Route::put('/coffee/{id}', [CoffeeController::class, 'update'])->name('admin.coffee.update');
    Route::delete('/coffee/{id}', [CoffeeController::class, 'destroy'])->name('admin.coffee.destroy');
    Route::get('/blogs', [BlogController::class, 'indexAdmin'])->name('admin.blog.index');
    Route::get('/blogs/search', [BlogController::class, 'search'])->name('admin.blog.search');
    Route::get('/blogs/create', [BlogController::class, 'create'])->name('admin.blog.create');
    Route::post('/blogs', [BlogController::class, 'store'])->name('admin.blogs.store');
    Route::get('/blog/{id}/edit', [BlogController::class, 'edit'])->name('admin.blog.edit');
    Route::put('/blog/{id}', [BlogController::class, 'update'])->name('admin.blog.update');
    Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('admin.blog.destroy');
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
