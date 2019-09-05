<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HalamanUtamaController extends Controller
{
    public function index()
    {
        $nama_lokasi_par = GenderModel::select('gender')->get();
        $nama_kategori_par = HobiModel::select('hobi')->get();
        return view('HalamanUtama.index',['$nama_lokasi_par'=>$nama_lokasi_par],['$nama_kategori_par'=>$nama_kategori_par]); // ngelempar data array bentuknya json
    }}