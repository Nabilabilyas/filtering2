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
    return view('kategori.index_kategori');
});

Route::get('/kategori','KategoriController@index');
Route::post('/kategori/add','KategoriController@add');
Route::get('/kategori/detail/{id}','KategoriController@detail');
Route::get('/kategori/edit/{id}','KategoriController@edit');
route::post('/kategori/update','KategoriController@update');
route::get('/kategori/delete/{id}','KategoriController@delete');
route::get('/kategori/aktif/{id}','KategoriController@aktif');



