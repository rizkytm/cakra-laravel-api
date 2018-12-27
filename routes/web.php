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


 Route::prefix('admin')->group(function() {
   Route::get('/login',
   'Auth\AdminLoginController@showLoginForm')->name('admin.login');
   Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
   Route::get('logout/', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    Route::get('/posttable', 'AdminController@poststable')->name('postadmin.view');
    Route::delete('/{post}/delete', 'AdminController@destroy')->name('postadmin.destroy');
	Route::get('/{post}/edit', 'AdminController@edit')->name('postadmin.edit');
	Route::patch('/{post}/edit', 'AdminController@update')->name('postadmin.update');

	Route::get('/commentstable', 'AdminController@commentstable')->name('commentsadmin.view');
	Route::delete('/deletecomment/{comment}', 'AdminController@commentsdestroy')->name('commentsadmin.destroy');

	Route::get('/userstable', 'AdminController@userstable')->name('usersadmin.view');
	Route::delete('/deleteuser/{user}', 'AdminController@usersdestroy')->name('usersadmin.destroy');

	Route::get('/categoriestable', 'AdminController@categoriestable')->name('categoriesadmin.view');
	Route::post('/tambahkategori', 'AdminController@storekategori')->name('store.kategori');
	Route::delete('/deletecategory/{category}', 'AdminController@categorydestroy')->name('categoriesadmin.destroy');
	Route::patch('/categoriestable/{id}/update', 'AdminController@updatekategori')->name('update.kategori');

  });

Auth::routes();

Route::get('/logout', 'Auth\LoginController@userLogout')->name('user.logout');
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
Route::post('/show/{id}/like', 'PostController@like')->name('like');
Route::delete('/show/{id}/dislike', 'PostController@dislike')->name('dislike');
Route::get('/profile/{user}/edit', 'HomeController@editpage')->name('profile.editpage');
Route::patch('/profile/{user}/edit', 'HomeController@edit')->name('profile.edit');
Route::delete('profil/{user}/edit', 'HomeController@destroy')->name('avatar.delete');