<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// url + view
Route::view('a-propos', 'a-propos');
Route::view('contact', 'contact');

Route::get('clients', 'ClientsController@list');
Route::post('clients', 'ClientsController@store');
