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

Route::get('/', 'HeroController@index')->name('hero_index');
Route::get('/{id}', 'HeroController@show');
Route::put('/{id}', 'HeroController@update');
Route::delete('/{id}', 'HeroController@delete');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
