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

Route::group(['namespace'=>'Admin'],function(){

    Route::get('admin','LoginController@create')->name('admin');
    Route::post('login','LoginController@login')->name('login');
    Route::group(['middleware'=>'auth'],function(){
        Route::get('index','IndexController@index')->name('index');
        Route::get('loginout','LoginController@loginOut')->name('loginout');
        Route::resource('category','CategoryController');
    });
});

Route::get('/', function () {
    return view('welcome');
});
