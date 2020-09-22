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


Route::get('/', 'HomeCtrl@index');
Route::get('/products', 'HomeCtrl@products')->name('products');
Route::get('/product', 'HomeCtrl@product')->name('product');

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin','middleware'=>['auth','admin']], function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.index');

    Route::resource('product', 'ProductsCtrl');
    Route::resource('user', 'UserssCtrl');
    Route::resource('order', 'OrdersCtrl');

});
Route::get('order', 'OrdersCtrl@create')->name('creatingorder');
Route::resource('cart', 'CartCtrl');
Route::resource('review', 'ProductsCtrl@reviw');
Route::get('ordercheck', 'orderCheckCtrl@ocheck');

