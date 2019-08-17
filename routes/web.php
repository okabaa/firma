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

Route::get('/', 'HomeGetController@get_index');
Route::get('/index', 'HomeGetController@get_index_yonlendir');
Route::get('/anasayfa', 'HomeGetController@get_index_yonlendir');
Route::get('/home', 'HomeGetController@get_index_yonlendir');
Route::get('/iletisim', 'HomeGetController@get_iletisim');
Route::get('/hakkimizda', 'HomeGetController@get_hakkimizda');

Route::group(['prefix'=>'admin'],function (){
    Route::get('/','AdminGetController@get_index');
    Route::get('/ayarlar','AdminGetController@get_ayarlar');
    Route::get('/hakkimizda','AdminGetController@get_hakkimizda');
    Route::post('/ayarlar','AdminPostController@post_ayarlar');
});

