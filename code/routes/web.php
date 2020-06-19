<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|这里是您可以为您的应用程序******注册web路由******的地方。这些
|路由由RouteServiceProvider在其中一个组中加载
|包含“web”中间件组。现在创造一些伟大的东西!
*/

Route::get('/', function () {
    return view('welcome');
});

Route::any('/login','XMController@login');
Route::any('/out','XMController@out');
Route::any('/register','XMController@register');
Route::any('/add_user','XMController@add_user');
Route::any('/login_Check','XMController@login_Check');
Route::any('/login_Success','XMController@login_Success');
Route::any('/insert_things','XMController@insert_things');
Route::any('/insert_things_Check','XMController@insert_things_Check');
Route::any('/update_things','XMController@update_things');
Route::any('/update_things_Check','XMController@update_things_Check');
Route::any('/delete_things','XMController@delete_things');
Route::any('/accept_things','XMController@accept_things');
Route::any('/not_accept_things','XMController@not_accept_things');
Route::any('/TODO','XMController@TODO');
Route::any('/TODO_all','XMController@TODO_all');
Route::any('/add_list','XMController@add_list');
Route::any('/add_list_Check','XMController@add_list_Check');
Route::any('/show_list_doing','XMController@show_list_doing');
Route::any('/show_list_done','XMController@show_list_done');
Route::any('/delete_list_done','XMController@delete_list_done');

Route::any('/update_list','XMController@update_list');
Route::any('/update_list_Check','XMController@update_list_Check');
Route::any('/delete_Select_list','XMController@delete_Select_list');

Route::any('/add_friend','XMController@add_friend');
Route::any('/delete_friend','XMController@delete_friend');
