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

// Route::get('/', function () {
//     return view('welcome');
// });


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
