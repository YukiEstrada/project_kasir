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


Route::get('admin/login', "LoginController@showLogin")->name('login_show');
Route::post('admin/login', "LoginController@login")->name('login_admin');
Route::get('admin/logout', "LoginController@logout")->name("logout_show");

Route::group(['middleware' => 'CekAdmin'], function () 
{   Route::get("admin/home", "AdminHomeController@index")->name("admin_home");
    Route::get("admin/itemCreate", "AdminItemController@createMenu")->name("admin_item_create_show");
    Route::post("admin/itemCreate", "AdminItemController@submit")->name("admin_item_create_post");
    Route::get('admin/dataMenu', "AdminItemController@index")->name("admin_data_menu");
    Route::get('admin/itemRestore/{id}', "AdminItemController@restoreMenu")->name("admin_data_menu_restore");
    Route::get("admin/itemUpdate/{id}", "AdminItemController@updateMenu")->name("admin_item_update_show");
    Route::post("admin/itemUpdate/{id}", "AdminItemController@update")->name("admin_item_update_post");
    Route::get("admin/itemDelete/{id}", "AdminItemController@deleteMenu")->name("admin_item_delete_show");
});

Route::get('user/category', "CustomerItemController@index")->name("user_category");
// Route::get('user/itemCategory/{category_slug}', "ItemComponent@render")->name("item_category");

// Route Add Items to Cart
Route::post('user/addToCart/{id}', "CustomerItemController@getAddToCart")->name("item_addToCart");
Route::get('user/cart', "CustomerItemController@showCart")->name("item_Cart");
Route::get('user/invoice', "CustomerItemController@invoice")->name("item_invoice");
Route::get('user/printInvoice', "CustomerItemController@printInvoice")->name("item_printInvoice");