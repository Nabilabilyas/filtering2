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
                            if ($data->isdelete==1) {
                                $button = '<button type="button"id="'.$data->kode_kategori.'"class=" btn btn-outline-success btn-sm form-control input-lg">Aktif</button>';   
                                 return $button;

                            }else{
                                $button = '<button type="button"id="'.$data->kode_kategori.'"class="aktif btn btn-outline-success btn-sm">Aktif</button>'.'<button type="button"id="'.$data->kode_kategori.'"class=" btn btn-outline-danger btn-sm">Non Aktif</button>';
                                return $button;
                                }
                        	})
                        ->addColumn('edit',function($data){
                            $button = '<button type="button"id="'.$data->kode_kategori.'"class="edit btn btn-primary btn-sm">Edit</button>';
                            return $button;
                            })  
                        ->addColumn('delete',function($data){
                            if ($data->isdelete==0) {
                                
                            }else{
                                $button = '<button type="button"id="'.$data->kode_kategori.'"class="delete btn btn-danger btn-sm">Delete</button>';
                                return $button;
                                }
                            })
                        ->addColumn('detail',function($data){
                            $button = '<button type="button"id="'.$data->kode_kategori.'"class="detail btn btn-warning btn-sm">Detail</button>';
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
            return response()->json(['errors'=>'Data Sudah Ada']);
		}else{
			Kategori::create($form_data);
        	return response()->json(['success'=>'Data Berhasil Ditambah']);
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
            'isdelete' =>$isdelete
        );
        Kategori::where ('kode_kategori','=',$id)->update($Update);

        return response()->json(['success'=>'Data Berhasil Diapdate']);
    }
//Aktif
    public function aktif($id){
        $isdelete = 1;
        $Update = array(
            'isdelete' =>$isdelete
        );
        Kategori::where ('kode_kategori','=',$id)->update($Update);

        return response()->json(['success'=>'Data Berhasil Diapdate']);
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
            return response()->json(['success'=>'Data Berhasil Diapdate']);
        }

}//penutup document
