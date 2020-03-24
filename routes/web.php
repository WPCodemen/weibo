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
Route::get('/', 'StaticPagesController@home')->name('home');

//帮助页面
Route::get('/help', 'StaticPagesController@help')->name('help');

//关于我们
Route::get('/about', 'StaticPagesController@about')->name('about');


//用户注册
Route::get('signup', 'UsersController@create')->name('signup');

//用户控制器的路由
//Route::get('users', 'UsersController');	

//新增的 resource 资源路由
Route::resource('users', 'UsersController');

// //用户列表
// Route::get('/users', 'UsersController@index')->name('users.index');

// //创建用户的页面
// Route::get('/users/create', 'UsersController@create')->name('users.create');

// //用户展示
// Route::get('/users/{user}', 'UsersController@show')->name('users.show');

// //用户储存——创建用户
// Route::post('/users', 'UsersController@store')->name('users.store');

// //用户编辑——编辑用户页面
// Route::get('/users/{user}/edit', 'UsersController@eidt')->name('users.edit');

// //用户更新
// Route::patch('/users/{user}', 'UsersController@update')->name('users.update');

// //用户删除
// Route::delete('/users/{user}', 'UsersController@destroy')->name('users.destroy');
