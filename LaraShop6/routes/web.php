<?php

use Illuminate\Support\Facades\Route;
use Gloudemans\Shoppingcart\Facades\Cart;

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

Route::name('home')->get('/', function () {
    return view('welcome');
});

//prod routes
Route::name('shop')->get('shop', 'ProductController@index');
Route::get('shop/{slug}', 'ProductController@show')->name('products.show');

// cart routes
Route::post('panier/ajouter', 'CartController@store')->name('store');
Route::get('videpanier', function() {
    Cart::destroy();
});
Route::delete('panier/{rowId}', 'CartController@destroy')->name('destroy');

// Panier
Route::get('panier', 'CartController@index')->name('panier');