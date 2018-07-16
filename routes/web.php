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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/edit-profile', 'UserController@editProfile')->name('edit-profile');

Route::post('/update-profile', 'UserController@updateProfile')->name('update-profile');

Route::get('/categories', 'CategoryController@index')->name('categories');

Route::get('/products', 'ProductController@index')->name('products');
