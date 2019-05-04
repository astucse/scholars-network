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

Route::get('/login', 'AccountsController@login')->name('login');
Route::post('/login', 'AccountsController@login_submit')->name('login.submit');
Route::get('/register', 'AccountsController@register')->name('register');
Route::post('/register_scholar', 'AccountsController@register_scholar')->name('register.scholar');
Route::post('/register_university', 'AccountsController@register_university')->name('register.university');

Route::get('/logout', 'AccountsController@logout')->name('logout');

Route::prefix('accounts')->group(function() {
    Route::get('/', 'AccountsController@index');
});
