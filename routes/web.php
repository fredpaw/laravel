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

Route::get('/', 'HomeController@home')->name('home');

Route::get('user/name', 'User\UserController@name');

Route::get('/young/{age}', 'User\UserController@young')->middleware('young');

Route::get('/about', 'HomeController@about')->name('about');
