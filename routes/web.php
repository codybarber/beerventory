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

Route::resource('/beers', 'BeersController', [
  'except' => ['edit', 'store']
])->middleware('auth');

Route::get('/dashboard', 'HomeController@index')->middleware('auth');
Route::get('/api/dashboard', 'HomeController@show')->middleware('auth');

Route::get('/add_beer', 'AddBeersController@index')->middleware('auth');
Route::post('/api/add_beer', 'AddBeersController@store')->middleware('auth');

Route::put('/api/update_beerventory', 'CollectionsController@update')->middleware('auth');
Route::put('/api/delete_beerventory', 'CollectionsController@destroy')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');
