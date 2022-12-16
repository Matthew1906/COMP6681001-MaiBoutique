<?php

use App\Http\Controllers\AuthController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;

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
        return redirect(route('products.index'));
    }
    return view('pages.landing');
})->name('landing');

Route::controller(AuthController::class)->group(function(){
    Route::get('/login', 'login')->name('users.login');
    Route::post('/login', 'authenticate')->name('users.authenticate');
    Route::get('/register', 'create')->name('users.create');
    Route::post('/register', 'store')->name('users.store');
    Route::get('/logout', 'logout')->name('users.logout')->middleware('auth');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/users/{user_id}', 'profile')->name('users.show');
    Route::get('/users/{user_id}/profile', 'editProfile')->name('users.edit.profile')->middleware('member');
    Route::get('/users/{user_id}/password', 'editPassword')->name('users.edit.password');
    Route::patch('/users/{user_id}', 'update')->name('users.update');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'index')->name('products.index');
    Route::get('/products/search', 'search')->name('products.search');
    Route::get('/products/create', 'create')->name('products.create')->middleware('admin');
    Route::post('/products', 'store')->name('products.store')->middleware('admin');
    Route::get('/products/{id}', 'show')->name('products.show')->where('id', '[0-9]+');
    Route::delete('/products/{id}', 'destroy')->name('products.destroy')->middleware('admin');
});

Route::controller(OrderController::class)->group(function () {
    Route::get("/users/{user_id}/cart", "index")->name("orders.index");
    Route::patch("/users/{user_id}/cart/{product_id}", "update")->name("orders.update");
    Route::delete('/users/{user_id}/cart/{product_id}', "destroy")->name("orders.destroy");
});

Route::controller(TransactionController::class)->group(function () {
    Route::get("/users/{user_id}/history", "index")->name("transactions.index");
    Route::get("/users/{user_id}/checkout", "store")->name('transactions.store');
});

Route::fallback(function () {
    return redirect(route('landing'));
});
