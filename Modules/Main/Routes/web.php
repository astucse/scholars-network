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

Route::get('/', 'MainController@index')->name('index');
Route::get('/home/university', 'MainController@home_university')->name('home.university');
Route::get('/home/scholar', 'MainController@home_scholar')->name('home.scholar');
Route::prefix('main')->group(function() {

});
