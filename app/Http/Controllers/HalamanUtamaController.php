<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Barang;
use App\Lokasi;
use App\Penjual;
use App\Kategori;
use DB;

class HalamanUtamaController extends Controller
{
    public function index() {
    	if (request()->ajax()) {
           return datatables()->of(DB::table('barang')
           	-> join('lokasi', 'lokasi.kode_lokasi', '=', 'barang.kode_lokasi')
		        -> join('kategori', 'barang.kode_kategori', '=', 'kategori.kode_kategori')
		        -> join('penjual', 'barang.kode_penjual', '=', 'penjual.kode_penjual')
		        ->select('barang.nama_barang','barang.harga_barang','lokasi.nama_lokasi','kategori.nama_kategori','penjual.nama_penjual')
		        ->get())->make(true);   
    	}
    return View::make('home1.index_home');
	}
}