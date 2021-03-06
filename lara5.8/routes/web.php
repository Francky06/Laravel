<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;


Route::get('/', function () {

     /* TEST PHONE One To One
    $user = factory('App\User')->create();
    $phone = new App\Phone();
    $phone->phone_number = '06 06 06 06 06';
    $user->phone()->save($phone);
    */
    /*
    $user->phone()->create([
        'phone_number' => '06 05 04 03 02'
    ]);
    */

        /* TEST POSTS OneToMany
    $user = App\User::first();
    $user->posts()->create([
        "title" => "Hello",
        "content" => "Super sontenu"

    ]);
        */

    /* TEST ROLES MANYTOMANY
    
    $user = factory('App\User')->create();
    //$roles = App\Role::all();
    $roles = App\Role::first();
    //detach(roles) pour enlever un role 
    $user->roles()->attach($roles);

    /* Role par id, sync au lieu de detach pour suncro les id
    $user = factory('App\User')->create();
    $user->roles()->attach([1, 3])
    */ 




    return view('welcome');
})->name('welcome');




// url + view
Route::view('a-propos', 'a-propos')->name('a-propos')->middleware('test');
Route::view('contact', 'contact/contact')->name('contact');

// CLIENTS
Route::get('clients', 'ClientsController@index')->name('clients');
Route::get('clients/create', 'ClientsController@create')->name('clients/create');
Route::post('clients', 'ClientsController@store');
Route::get('clients/{client}', 'ClientsController@show');
Route::get('clients/{client}/edit', 'ClientsController@edit')->name('clients/edit');
Route::delete('clients/{client}', 'ClientsController@destroy');
Route::patch('clients/{client}', 'ClientsController@update')->name('clients/update');

// ou si pas de noms de routes
// Route::resource('clients', 'ClientsController');

// CONTACT
Route::get('contact/create', 'ContactController@create');
Route::post('contact', 'ContactController@store');

//AUTH
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
