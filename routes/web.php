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

Route::get('/category/edit/{id}', 'CategoryController@edit');

Route::post('/category/delete', 'CategoryController@delete');

Route::get('/products', 'ProductController@index')->name('products');

Route::get('/product/edit/{id}', 'ProductController@edit');

Route::post('/product/delete', 'ProductController@delete');
