<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Lokasi;
use App\Penjual;
use App\Kategori;

class BarangController extends Controller
{
    public function index(){
    	if (request()->ajax()) {
           return datatables()->of(Penjual::all())
           		->addColumn('edit',function($data){
                    $button ='<button type="button" name="edit" id="'.$data->kode_barang.'"class="edit btn btn-primary btn-sm">Edit</button>';
            		return $button;
            	})
           		->addColumn('delete',function($data){
           			if ($data->is_delete == 1) {
           			$button ='<button type="button" name="delete" id="'.$data->kode_barang.'"class="delete btn btn-danger btn-sm">Delete</button>';
           			return $button;
           			}
            	})
            	->addColumn('detail',function($data){
            		$button ='<button type="button" name="detail" id="'.$data->kode_barang.'"class="detail btn btn-secondary btn-sm">Detail</button>';
            		return $button;
           		})
           		->addColumn('status',function($data){
           			if ($data->is_delete==0) {
            		$button ='<button type="button" name="nonaktif" id="'.$data->kode_barang.'"class="btn btn-danger btn-sm" disabled>Non-Aktif</button>';
            		$button.="&nbsp;&nbsp;";
            		$button.='<button type="button" name="aktif" id="'.$data->kode_barang.'"class=" aktif btn btn-success btn-sm">Aktifkan</button>';
            		return $button;           				
           			}else{
           				$button ='<button type="button" name="Aktif" id="'.$data->kode_barang.'"class="btn btn-success btn-sm" disabled>Aktif</button>';
           				return $button;
           			}
           		})

            ->rawColumns(array("edit","delete","detail","status"))
            ->make(true);
       }
       $lokasis = Lokasi::select('kode_lokasi')->get();
       $kategoris = Kategori::select('kode_kategori')->get();
       $penjuals = Penjual::select('kode_penjual')->get();
    	return view::make('index_barang')->with('lokasis',$lokasis)->with('kategoris',$kategoris)->with('penjuals',$penjuals);
    }
}
