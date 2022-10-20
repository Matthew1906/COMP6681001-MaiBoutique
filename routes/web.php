<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;

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
    $signedIn = true;
    if($signedIn){
        $products = Product::all();
        return view('pages.home', ['signedIn'=>true, 'admin'=>false, 'products'=>$products]);
    }
    return view('pages.home', ['signedIn'=>false, 'admin'=>false]);
});
