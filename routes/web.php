<?php

use App\Models\Item;
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
    return redirect()->route('user_menu');
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

Route::get('user/menu', 'CustomerItemController@showMenu')->name('user_menu');
Route::get('/user/search','CustomerItemController@search')->name('user_search');
Route::get('user/cart', 'CustomerItemController@showCart')->name('item_Cart');
Route::post('user/cart/add-item', 'CustomerItemController@addItemToCart')->name('item_addToCart');
Route::get("admin/cart/delete/{id}", "CustomerItemController@deleteMenuCart")->name("user_item_delete_show");
Route::post('user/cart/checkout', 'CustomerItemController@checkout')->name('cart_checkout');
Route::get('user/invoice', 'CustomerItemController@showInvoice')->name('item_invoice');
