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

if(config('app.env') === 'production'){
    // asset()やurl()がhttpsで生成される
    URL::forceScheme('https');
}

Auth::routes();

// ログイン処理
Route::get('/admin/login', ['as'   => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('/admin/login', ['as'   => 'login', 'uses' => 'Auth\LoginController@login']);

// ログアウト処理
Route::get('/admin/logout', ['as'   => 'logout', 'uses' => 'Auth\LoginController@logout']);

// 管理画面
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/admin/index', 'AdminController@index')->name('index');

// 登録画面
//　登録するときはコメントアウトすること
// Route::get('/register', ['as'   => 'logout', 'uses' => 'Auth\LoginController@logout']);
// Route::post('/register', ['as'   => 'logout', 'uses' => 'Auth\LoginController@logout']);
