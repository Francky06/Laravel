<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');
// url + view
Route::view('a-propos', 'a-propos')->name('a-propos');
Route::view('contact', 'contact/contact')->name('contact');

// CLIENTS
Route::get('clients', 'ClientsController@index')->name('clients');
Route::get('clients/create', 'ClientsController@create')->name('clients/create');
Route::post('clients', 'ClientsController@store');
Route::get('clients/{client}', 'ClientsController@show');
Route::get('clients/{client}/edit', 'ClientsController@edit');
Route::delete('clients/{client}', 'ClientsController@destroy');
Route::patch('clients/{client}', 'ClientsController@update');

// ou si pas de noms de routes
// Route::resource('clients', 'ClientsController');

// CONTACT
Route::get('contact/create', 'ContactController@create');
Route::post('contact', 'ContactController@store');