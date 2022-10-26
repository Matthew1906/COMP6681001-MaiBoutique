<?php

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

// Home
Route::get('/', function () {
    $signedIn = true;
    if($signedIn){
        $products = Product::all();
        return view('pages.home', ['signedIn'=>true, 'admin'=>false, 'products'=>$products]);
    }
    return view('pages.home', ['signedIn'=>false, 'admin'=>false]);
})->name('home');

// Login Page
Route::get('/login', [UserController::class, 'login'])->name('login');

Route::post('/authenticate', [UserController::class, 'authenticate']);

// Register Page
Route::get('/register', [UserController::class, 'register'])->name('register');

Route::post('/register', [UserController::class, 'store']);

// Search
Route::get('/search', function (Request $request) {
    $signedIn = true;
    if($signedIn){
        $params = $request->query('query', "");
        $products = Product::where('name', 'like', '%'.$params.'%')
            ->orWhere('description', 'like', '%'.$params.'%')
            ->get();
        return view('pages.home', ['signedIn'=>true, 'admin'=>false, 'products'=>$products, 'search'=>true]);
    }
    return view('pages.home', ['signedIn'=>false, 'admin'=>false]);
})->name('search');

// Get products by id
Route::get('/products/{id}', function($id){
    // Will include edit cart
    $product = Product::find($id);
    return view('pages.detail', ['signedIn'=>true, 'admin'=>false, 'product'=>$product]);
})->name('detail');

// Add product
Route::get('/add-product', function(){
    return view('pages.add-product', ['signedIn'=>true, 'admin'=>true]);
})->name('add-product');

// Get user cart
Route::get('{user_id}/cart', function($user_id){
    $products = Product::all()->random(7);
    return view('pages.cart', ['signedIn'=>true, 'admin'=>false, 'products'=>$products]);
})->name('cart');

// Get cart details
Route::get('{user_id}/cart/{product_id}', function($user_id, $product_id){
    $product = Product::find($product_id);
    return view('pages.detail', ['signedIn'=>true, 'admin'=>false, 'product'=>$product, 'edit'=>true]);
})->name('edit-cart');
