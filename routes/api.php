<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/', function () {
    return view('welcome');
});
 
Route::post('user/register', 'APIRegisterController@register');

Route::post('user/login', 'APILoginController@login');


Route::middleware('jwt.auth')->get('/users', function (Request $request) {
    return auth()->user();
});


Route::middleware('jwt.auth')->group( function(){
    Route::resource('books', 'API\BookController') ;
} );

Route::middleware('jwt.auth')->group( function(){
    Route::resource('posts', 'API\PostController') ;
} );

Route::middleware('jwt.auth')->group( function(){
    Route::resource('news', 'API\NewsController') ;
} );

Route::middleware('jwt.auth')->group( function(){
    Route::resource('comments', 'API\CommentController') ;
    Route::post('/posts/{id}/comment', 'API\CommentController@store')->name('comment');
    Route::get('/posts/{id}/comment', 'API\CommentController@show')->name('show.comment');
} );

