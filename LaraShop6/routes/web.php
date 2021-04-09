<?php

use App\Http\Controllers\CheckoutController;
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
Route::delete('panier/{rowId}', 'CartController@destroy')->name('destroy');
Route::patch('panier/{rowId}', 'CartController@update')->name('update');
// Panier
Route::get('panier', 'CartController@index')->name('panier');

// checkout
Route::get('paiement', 'CheckoutController@index')->name('paiement');
Route::post('paiement', 'CheckoutController@store')->name('paiementStore');
Route::get('merci', 'CheckoutController@thankyou')->name('checkout.thankyou');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
