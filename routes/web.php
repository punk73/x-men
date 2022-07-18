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



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// skills
Route::get('/skills', 'SkillController@index');
Route::get('/skills/combo', 'SkillController@combo');
Route::get('/skills', 'SkillController@index')->name('skill_index');
Route::get('/skills/{id}', 'SkillController@show')->where('id', '[0-9]+');
Route::put('/skills/{id}', 'SkillController@update');
Route::delete('/skills/{id}', 'SkillController@delete');
Route::post('/skills/', 'SkillController@store');
Route::post('/skills/{id}/heroes', 'HeroController@attach');
Route::delete('/skills/{id}/heroes', 'HeroController@detach');

Route::get('/', 'HeroController@index')->name('hero_index');
Route::get('/combo', 'HeroController@combo');
Route::get('/{id}', 'HeroController@show')->where('id', '[0-9]+');
Route::put('/{id}', 'HeroController@update');
Route::delete('/{id}', 'HeroController@delete');
Route::post('/', 'HeroController@store');
Route::post('/{id}/skills', 'HeroController@attach');
Route::delete('/{id}/skills', 'HeroController@detach');
Route::post('/', 'HeroController@store');


