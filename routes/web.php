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

// スレッド
Route::get('/thread', 'HomeController@viewThread')->name('thread');
Route::post('/thread', 'HomeController@postThread');
Route::get('/thread/file/{serverFilename}', 'HomeController@downloadThread')->name('threadDownload');

// ファイル
Route::get('/file', 'HomeController@viewFile')->name('file');

// お支払い
Route::get('/payment', 'HomeController@payment')->name('payment');

// 設定
Route::get('/setting', 'HomeController@viewSetting')->name('setting');

// パスワード変更
Route::get('changepassword', 'HomeController@showChangePasswordForm')->name("changepass");
Route::post('changepassword', 'HomeController@changePassword')->name('changepassword');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
