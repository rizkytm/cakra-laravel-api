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

Route::get('/homes', 'HomeController@index')->name('home');
Route::get('/home', 'PostController@index')->name('beranda');
Route::get('/create', 'PostController@create')->name('create');
Route::get('/show/{id}', 'PostController@show')->name('show');
Route::delete('/home/{id}/delete', 'PostController@destroy')->name('post.destroy');
Route::post('/create', 'PostController@store')->name('store');
Route::get('/show/{id}/edit', 'PostController@edit')->name('edit');
Route::patch('/show/{id}/update', 'PostController@update')->name('update');
Route::post('/show/{id}/comment', 'PostController@comment')->name('comment');
Route::delete('/show/{id}/comdelete', 'PostController@delcom')->name('comment.destroy');
Route::get('/profile', 'HomeController@profile')->name('profile');
Route::get('query', 'HomeController@search')->name('query');
Route::get('/user/{user}', 'HomeController@user')->name('user');