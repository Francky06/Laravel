<?php

use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\CheckoutController;

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

Route::name('homes')->get('/', function () {
    return view('welcome');
});

//prod routes
Route::name('shop')->get('shop', 'ProductController@index');
Route::get('shop/{slug}', 'ProductController@show')->name('products.show');
Route::get('search', 'ProductController@search')->name('search');


Route::group(['middleware' => ['auth']], function() {
    Route::post('panier/ajouter', 'CartController@store')->name('store');
    Route::delete('panier/{rowId}', 'CartController@destroy')->name('destroy');
    Route::patch('panier/{rowId}', 'CartController@update')->name('update');
    Route::get('panier', 'CartController@index')->name('panier');

    Route::get('paiement', 'CheckoutController@index')->name('paiement');
    Route::post('paiement', 'CheckoutController@store')->name('paiementStore');
    Route::get('merci', 'CheckoutController@thankyou')->name('checkout.thankyou');
});



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
