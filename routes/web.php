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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/penjual','PenjualController@index');
Route::post('/penjual/add','PenjualController@add');
Route::post('/penjual/update','PenjualController@update');
Route::get('/penjual/detail/{id}','PenjualController@detail');
Route::get('/penjual/edit/{id}','PenjualController@edit');
Route::get('/penjual/delete/{id}','PenjualController@delete');
Route::get('/penjual/aktif/{id}','PenjualController@aktif');