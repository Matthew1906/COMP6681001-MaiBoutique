<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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
    return view('pages.landing');
})->name('landing');

Route::controller(UserController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate')->name('authenticate');
    Route::get('/register', 'create')->name('create-user');
    Route::post('/register', 'store')->name('store-user');
    Route::get('/logout', 'logout')->name('logout')->middleware('auth');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'index')->name('home');
    Route::get('/products/search', 'search')->name('search');
    Route::get('/products/{id}', 'show')->name('detail')->where('id', '[0-9]+');;
    Route::get('/products/add', 'create')->name('create-product')->middleware('admin');
    Route::post('/products/add', 'store')->name('store-product')->middleware('admin');
    Route::get('/products/delete/{id}', 'destroy')->name('destroy-product')->middleware('admin');
});

// Get user cart
Route::get('{user_id}/cart', function ($user_id) {
    $products = Product::all()->random(7);
    return view('pages.cart', ['signedIn' => true, 'admin' => false, 'products' => $products]);
})->name('cart');

// Get cart details
Route::get('{user_id}/cart/{product_id}', function ($user_id, $product_id) {
    $product = Product::find($product_id);
    return view('pages.detail', ['signedIn' => true, 'admin' => false, 'product' => $product, 'edit' => true]);
})->name('edit-cart');
