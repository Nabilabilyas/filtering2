<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Barang;
use App\Lokasi;
use App\Penjual;
use App\Kategori;

class BarangController extends Controller
{
    public function index(){
      if (request()->ajax()) {
           return datatables()->of(Barang::all())
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
      return view::make('Barang.index_barang')->with('lokasis',$lokasis)->with('kategoris',$kategoris)->with('penjuals',$penjuals);
    }

    //add
    public function add(request $request){
      $is_delete = 1;
      $form_data = array(
        'kode_barang' => $request->kode_barang,
        'nama_barang' => $request->nama_barang,
        'harga_barang' => $request->harga_barang,
        'kode_lokasi' => $request->kode_lokasi,
        'kode_kategori' => $request->kode_kategori,
        'kode_penjual' => $request->kode_penjual,
        'status' => $request->is_delete,
        'is_delete' => $is_delete
      );
      $kode= Barang::where('kode_barang', '=', $request->kode_barang)->get();
      $count = count($kode);
       if ($count == 1) {
        return response()->json(['errors'=>'Data already exist in Database']);
       }else{
        Barang::create($form_data);
        return response()->json(['success'=>'Data added successfully']);
      }
    }

    // detail
    public function detail(request $request, $kode_barang){
      if ($request->ajax()) {
            $data  = Barang::where('kode_barang', '=', $kode_barang)->get();
            return response()->json(['data'=>$data]);
        }
    }


    //edit
    public function edit(request $request, $kode_barang){
      if ($request->ajax()) {
            $data  = Barang::where('kode_barang', '=', $kode_barang)->get();
            return response()->json(['data'=>$data]);
        }
    }

    //update
    public function update(request $request){
      $form_data = array(
        'nama_barang' => $request->nama_barang,
        'harga_barang' => $request->harga_barang,
      );
      $kodeBar= Barang::where('kode_barang', '=', $request->kode_penjual)->update($form_data);
      return response()->json(['success'=>'Data successfully updated']);
    }

    public function delete($id){
        $is_delete = 0;
        $form_data = array(
            'is_delete'      => $is_delete
        );

        Barang::where('kode_barang','=', $id)->update($form_data);

        return response()->json(['success'=>'Data berhasil dihapus.']);
    }

   public function aktif($kode){
      $is_delete=1;
      $form_data = array(
        'is_delete' => $is_delete
      );
      $kodePel= Penjual::where('kode_penjual', '=', $kode)->update($form_data);
      return response()->json(['success'=>'Data berhasil Dihapus']);
    }
}