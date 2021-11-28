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

use App\User;

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
		    return view('welcome');
});

+Route::group(['prefix' => 'admin'], function(){
	//home
	Route::get('home', 'Admin\HomeController@index')->name('admin.home');
	//login logout
	Route::get('login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
	Route::post('login', 'Admin\Auth\LoginController@login')->name('admin.login');
	Route::post('logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');
	//register
	Route::get('register', 'Admin\Auth\RegisterController@showRegisterForm')->name('admin.register');
	Route::post('register', 'Admin\Auth\RegisterController@register')->name('admin.register');
});

/*
//ログイン後
Route::group(['middleware' => 'auth:user'], function() {
	    Route::get('/home', 'HomeController@index')->name('home');
});

//Admin 認証不要
Route::group(['prefix' => 'admin'], function() {
	Route::get('/home', 'HomeController@index')->name('admin.home');
	Route::get('/', function () { return redirect('/admin/home'); });
	Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
	Route::post('login', 'Admin\LoginController@login');
});


//Admin ログイン後
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
	Route::post('logout', 'Admin\LoginController@logout')->name('admin.logout');
	Route::get('home', 'Admin\HomeController@index')->name('admin.home');
});
/*
Route::get('/', 'ItemController@index')->name('item.index');
Route::get('/detail', 'ItemController@detail')->name('item.detail');
use App\Item;

