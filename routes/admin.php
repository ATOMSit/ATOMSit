<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')
    ->name('home');

Route::prefix('users')->as('user.')->group(function () {

    Route::get('edit/{id}', 'UserController@edit')
        ->name('edit');
    Route::put('update/{id}', 'UserController@update')
        ->name('update');
});