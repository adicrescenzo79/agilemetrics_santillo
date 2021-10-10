<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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

// IL PERCORSO X CAMBIARE L'APPRODO DEL LOGIN SI TROVA IN C:\Users\adicr\Documents\Boolean\agilemetrics_santillo\app\Providers\RouteServiceProvider.php


Route::get('/', function () {
  return view('offline');

})->name('offline');



Route::prefix('my')->group(function(){
  Auth::routes();
});

Route::get('/usersapi', 'UserController@index');

Route::get('/welcome', 'HomeController@index')->name('welcome');

Route::get('/posts', 'HomeController@posts')->name('posts.index');

Route::get('/security', function () {
  return view('security');
});

// RIATTIVARE QUESTE ROTTE QUA SOTTO

// Route::get('posts', function () {
//     return view('guests.posts.index');
// })->name('posts.index');


 Route::get('posts/{slug}', function () {
     return view('guests.posts.show');
 })->name('posts.show');



  

Route::middleware('auth')->namespace('Admin')->prefix('admin')->name('admin.')
->group(function (){
  Route::resource('posts', 'PostController');
});
