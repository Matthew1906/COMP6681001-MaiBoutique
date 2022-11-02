<?php

use App\Http\Controllers\CartController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (Auth::check()) {
        return redirect(route('home'));
    }
    return view('pages.landing');
})->name('landing');

Route::controller(UserController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate')->name('authenticate');
    Route::get('/register', 'create')->name('create-user');
    Route::post('/register', 'store')->name('store-user');
    Route::get('/logout', 'logout')->name('logout')->middleware('auth');
    Route::get('/profile', 'profile')->name('profile')->middleware('auth');
    Route::get('/edit-profile', 'updateProfile')->name('edit-profile')->middleware('auth');
    Route::get('/edit-password', 'updatePassword')->name('edit-password')->middleware("auth");
    Route::patch('/user/profile', 'update')->name('update-profile')->middleware("auth");
    Route::get("/transaction-history", "profile")->name("transaction-history")->middleware('auth');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'index')->name('home');
    Route::get('/products/search', 'search')->name('search');
    Route::get('/products/{id}', 'show')->name('detail-product')->where('id', '[0-9]+');
    Route::delete('/products/{id}', 'destroy')->name('destroy-product')->middleware('admin');
    Route::get('/products/add', 'create')->name('create-product')->middleware('admin');
    Route::post('/products/add', 'store')->name('store-product')->middleware('admin');
});

Route::controller(CartController::class)->group(function () {
    Route::get("/users/{user_id}/cart", "index")->name("get-cart");
    Route::patch("/users/{user_id}/cart/{product_id}", "store")->name("update-cart");
    Route::delete('/users/{user_id}/cart/{product_id}', "destroy")->name("delete-cart");
    Route::get("/users/{user_id}/checkout", "checkout")->name('checkout-cart');
});

Route::fallback(function () {
    return redirect(route('landing'));
});
