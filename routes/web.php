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
    Route::get('orders/{type?}', 'OrdersCtrl@orders');

    Route::get('order/{id}', 'OrdersCtrl@getPdf')->name('getPdf');

});
Route::post('swichdelever/{orderid}','OrdersCtrl@swichdelever')->name('swich.delivered');
Route::group(['prefix' => 'user','middleware'=>['auth']], function () {
    Route::get('/', function () {
        return view('user.index');
    })->name('user.index');

Route::get('order', 'OrdersCtrl@create')->name('creatingorder');

Route::get('orders/{type}', 'userorders@orders');


});

Route::get('orders/{id}', 'userorders@getPdf')->name('usergetPdf');

Route::resource('cart', 'CartCtrl');
Route::resource('review', 'ProductsCtrl@reviw');
Route::get('ordercheck', 'orderCheckCtrl@ocheck');

/*Route::resource('invoice-pdf',function($orders)
{
    //return view('admin.order.invoice-pdf');

    $pdf =PDF::loadView('admin.order.invoice-pdf');
    return $pdf-> download('invoice.pdf');
});*/
