<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Barang;
use App\Lokasi;
use App\Penjual;
use App\Kategori;

class HalamanUtamaController extends Controller
{
    public function index()
    {
        $lokasis = Lokasi::select('kode_lokasi')->get();
        $kategoris = Kategori::select('kode_kategori')->get();
        $penjuals = Penjual::select('kode_penjual')->get();
        $barangs = Barang::select('kode_barang','nama_barang')->get();
      return view::make('home1.index_home')->with('lokasis',$lokasis)->with('kategoris',$kategoris)->with('penjuals',$penjuals)->with('barangs',$barangs); // ngelempar data array bentuknya json
    }}