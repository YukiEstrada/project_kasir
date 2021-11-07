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
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('admin/login', "LoginController@showLogin");
Route::post('admin/login', "LoginController@login")->name('login_admin');
Route::get("admin/home", "AdminHomeController@index")->name("admin_home");