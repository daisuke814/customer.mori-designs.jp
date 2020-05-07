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


Route::get('/', 'HomeController@index');
Route::get('/mypage', 'HomeController@index')->name('home');

// パスワード変更
Route::get('changepassword', 'HomeController@showChangePasswordForm')->name("changepass");
Route::post('changepassword', 'HomeController@changePassword')->name('changepassword');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
