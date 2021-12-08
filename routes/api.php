<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/posts', 'PostController@all');

Route::get('/postsLogged', 'PostController@logged');
Route::get('/postsNotLogged', 'PostController@notLogged');
Route::get('/posts/slug/{slug}', 'PostController@postBySlug');

Route::get('/articlesLogged', 'ArticleController@logged');
Route::get('/articlesNotLogged', 'ArticleController@notLogged');
Route::get('/articles/slug/{slug}', 'ArticleController@articleBySlug');
Route::get('/articles/id/{id}', 'ArticleController@articleById');

