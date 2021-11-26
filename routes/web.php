<?php

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

// Route::get('/', function () {
//     return view('guests.home');
// });
Route::get('/', 'HomeController@index')->name('home');

Route::get('/contatti', 'HomeController@contactFormHandler')->name('guest.contact');
Route::get('/thanks', 'HomeController@contactFormEnder')->name('guest.thanks');

Auth::routes();

Route::middleware('auth') //devi essere autenticato     
->namespace('Admin')      // prrendi i controller delle route tue figlie a partire dalla cartella Admin/
->prefix('admin')         // inserisci come prefisso nelle URI di tutte le route figlie di admin
->name('admin.')          // inserisci come prefisso per ogni nome di tutte le route figlie "admin."
->group(function(){       // e raggruppale in

    // tutte le rotte che iniziano con prefisso " "

    Route::resource('posts', 'PostController')->except([
        'index', 'show'
    ]);

    Route::resource('users', 'UserController');


    // Route::get('/travels', 'HomeController@index')->name('travels.index');

    // Route::get('/travels/{travel}', 'HomeController@show')->name('travels.show');

});

Route::resource('posts', PostController::class)->only([
        'index', 'show'
    ]);

// tutte le rotte che iniziano e finiscono per qualsiasi carattere che non siano state gestite fino ad ora saranno reindirizzate alla home
Route::get('{any?}', function(){
    return view('guests.home');
})->where('any','.*');

