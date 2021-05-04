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

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('blog', 'BlogController');
Route::resource('comment', 'CommentController')->only(['store', 'destroy']);

// 第三方登录
Route::get('/oauth/github', 'Auth\LoginController@redirectToProvider')->name('gitauth');
Route::get('/oauth/github/callback', 'Auth\LoginController@handleProviderCallback')->name('gitback');
