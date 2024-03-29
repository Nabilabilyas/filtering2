<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;

class KategoriController extends Controller
{
   public function index()//yajra
    {
        if (request()->ajax()) {
               return datatables()->of(Kategori::all())
                        ->addColumn('aktif',function($data){
                           if ($data->isdelete==0) {
<<<<<<< HEAD
                                $button ='<button type="button" name="nonaktif" id="'.$data->kode_kategori.'"class="btn btn-alert alert-danger" disabled>Non-Aktif</button>';
=======
                                $button ='<button type="button" name="nonaktif" id="'.$data->kode_kategori.'"class="btn btn-danger btn-sm" disabled>Non-Aktif</button>';
>>>>>>> 219593db355f13f1c26e103d74c74a1a8770c808
                                $button.="&nbsp;&nbsp;";
                                $button.='<button type="button" name="aktif" id="'.$data->kode_kategori.'"class=" aktif btn btn-primary btn-sm">Aktifkan</button>';
                                return $button;                         
                                }else{
                                    $button ='<button type="button" name="Aktif" id="'.$data->kode_kategori.'"class="form-control input-lg btn btn-alert alert-success btn-sms" disabled>Aktif</button>';
                                    return $button;
                                }
                        	})
                        ->addColumn('edit',function($data){
                            $button = '<button type="button"id="'.$data->kode_kategori.'"class="edit btn btn-primary btn-sm">Edit</button>';
                            return $button;
                            })  
                        ->addColumn('delete',function($data){
                            if ($data->isdelete == 1) {
                                $button ='<button type="button" name="delete" id="'.$data->kode_kategori.'"class="delete btn btn-danger btn-sm">Delete</button>';
                                return $button;
                                }
                            })
                        ->addColumn('detail',function($data){
                            $button = '<button type="button"id="'.$data->kode_kategori.'"class="detail btn btn-warning btn-sm">Liat</button>';
                            return $button;
                        })
                        
                        ->rawcolumns(array("aktif","edit","delete","detail"))
                        ->make(true);
          }
          return view('kategori.index_kategori');
    }

 //add
    public function add(request $request){
    	$isdelete = 1;
    	$form_data = array(
    		'kode_kategori'=>$request->kode_kategori,
    		'nama_kategori'=>$request->nama_kategori,
    		'biaya_kategori'=>$request->biaya_kategori,
    		'isdelete'		=>$isdelete
    	);

		$kodePel = Kategori::where ('kode_kategori','=',$request->kode_kategori )->get();
		$count = count($kodePel);

		if ($count == 1) {
            return response()->json(['errors'=>'Data telah ada didatabse']);
		}else{
			Kategori::create($form_data);
        	return response()->json(['success'=>'Data berhasil ditambah']);
		}

    }

 //------------------------------------------------------------------
 public function detail (Request $request,$id){
         if ($request->ajax()) {
            $data = Kategori::where('kode_kategori','=',$request->id)->get();
            return response()->json(['data'=>$data]);
        }
    }
public function edit (Request $request,$id){
         if ($request->ajax()) {
            $data = Kategori::where('kode_kategori','=',$request->id)->get();
            return response()->json(['data'=>$data]);
        }
    }
//Delete
    public function delete($id){
        $isdelete = 0;
        $Update = array(
            'isdelete' =>$isdelete,
            'tanggal_hapus'=>date('Y-m-d H:i:s')

        );
        Kategori::where ('kode_kategori','=',$id)->update($Update);

        return response()->json(['success'=>'Data Berhasil dihapus']);
    }
//Aktif
    public function aktif($id){
        $isdelete = 1;
        $Update = array(
            'isdelete' =>$isdelete,
            'tanggal_hapus'=>NULL

        );
        Kategori::where ('kode_kategori','=',$id)->update($Update);

        return response()->json(['success'=>'Data Berhasil diaktifkan']);
    }

//Update
public function update(request $request){
        $isdelete = 1;
        $Update = array(
            'kode_kategori'=>$request->kode_kategori,
    		'nama_kategori'=>$request->nama_kategori,
    		'biaya_kategori'=>$request->biaya_kategori,
    		'isdelete'		=>$isdelete
        );

        $kodePel = Kategori::where ('kode_kategori','=',$request->kode_kategori )->update($Update);
            return response()->json(['success'=>'Data Berhasil diupdate']);
        }

}//penutup document
