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

<<<<<<< HEAD
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



=======
// Route::get('/', function () {
//     return view('welcome');
// });

<<<<<<< HEAD

// Route::get('/', function () {
//     return view('lokasi.index_lokasi');
// });
Route::get('/','LokasiController@index');
Route::post('/Lokasi/add','LokasiController@add');
Route::get('/Lokasi/detail/{id}','LokasiController@detail');
Route::get('/Lokasi/delete/{id}','LokasiController@delete');
Route::get('/Lokasi/aktif/{id}','LokasiController@aktif');
Route::get('/Lokasi/edit/{id}','LokasiController@edit');
Route::post('/Lokasi/update','LokasiController@update');
// Route::get('/','PelajaranController@index');
// Route::get('/penjual','PenjualController@index');
=======
Route::get('/coba', function () {
    return view('test_templating.dua');
});

Route::get('/penjual','PenjualController@index');
Route::post('/penjual/add','PenjualController@add');
Route::post('/penjual/update','PenjualController@update');
Route::get('/penjual/detail/{id}','PenjualController@detail');
Route::get('/penjual/edit/{id}','PenjualController@edit');
Route::get('/penjual/delete/{id}','PenjualController@delete');
Route::get('/penjual/aktif/{id}','PenjualController@aktif');
>>>>>>> 41c1083382d7aa20450eea6ff43ca42b87b2acdb
>>>>>>> b788dc11c30eb5777789699340f9b41ca795db67
