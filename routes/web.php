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

Route::middleware( 'checkLocale')->group(function(){

    Route::get('/','productController@create');

    Route::get('/change_locale/{type_locale}','productController@change_locale')->name('change_locale');

    Route::get('/destroy_session','productController@destroy_session');

    Route::get('/show_all_products','productController@show')->name('show_all_products');

    Route::get('/buy_products','productController@buy_products')->name('buy_products');

    Route::get('/store_product_session/{product_id}','productController@session')->name('session_store');

    Route::post('/store_products','productController@store')->name("store_products");

    Route::post('/send_mail','productController@mail')->name("mail");


});





