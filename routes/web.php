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

//首页
Route::get('/', 'StaticPagesController@home');

//帮助页面
Route::get('/help', 'StaticPagesController@help');

//关于我们
Route::get('/about', 'StaticPagesController@about');

//登录的路由
Route::get('signup', 'UsersController@create')->name('signup');

//用户控制器的Restful 风格路由
Route::resource('users', 'UsersController');
