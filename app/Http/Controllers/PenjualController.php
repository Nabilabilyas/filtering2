<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penjual;

class PenjualController extends Controller
{
    public function index(){
    	if (request()->ajax()) {
           return datatables()->of(Penjual::all())
           		->addColumn('edit',function($data){
                    $button ='<button type="button" name="edit" id="'.$data->kode_penjual.'"class="edit btn btn-primary btn-sm">Edit</button>';
            		return $button;
            	})
           		->addColumn('delete',function($data){
           			if ($data->is_delete == 1) {
           			$button ='<button type="button" name="delete" id="'.$data->kode_penjual.'"class="delete btn btn-danger btn-sm">Delete</button>';
           			return $button;
           			}
            	})
            	->addColumn('detail',function($data){
            		$button ='<button type="button" name="detail" id="'.$data->kode_penjual.'"class="detail btn btn-secondary btn-sm">Detail</button>';
            		return $button;
           		})
           		->addColumn('status',function($data){
           			if ($data->is_delete==0) {
            		$button ='<button type="button" name="nonaktif" id="'.$data->kode_penjual.'"class="btn btn-danger btn-sm" disabled>Non-Aktif</button>';
            		$button.="&nbsp;&nbsp;";
            		$button.='<button type="button" name="aktif" id="'.$data->kode_penjual.'"class=" aktif btn btn-success btn-sm">Aktifkan</button>';
            		return $button;           				
           			}else{
           				$button ='<button type="button" name="Aktif" id="'.$data->kode_penjual.'"class="btn btn-success btn-sm" disabled>Aktif</button>';
           				return $button;
           			}
           		})

            ->rawColumns(array("edit","delete","detail","status"))
            ->make(true);
       }
    	return view ('penjual.index_penjual');
    }

    //add
    public function add(request $request){
    	$is_delete = 1;
    	$form_data = array(
    		'kode_penjual' => $request->kode_penjual,
    		'nama_penjual' => $request->nama_penjual,
    		'usia_penjual' => $request->usia_penjual,
    		'status' => $request->is_delete,
    		'is_delete' => $is_delete
    	);
    	$kode= Penjual::where('kode_penjual', '=', $request->kode_penjual)->get();
    	$count = count($kode);
    	 if ($count == 1) {
    	 	return response()->json(['errors'=>'Data already exist in Database']);
    	 }else{
    		Penjual::create($form_data);
    		return response()->json(['success'=>'Data added successfully']);
    	}
    }

    // detail
    public function detail(request $request, $kode_penjual){
    	if ($request->ajax()) {
            $data  = Penjual::where('kode_penjual', '=', $kode_penjual)->get();
            return response()->json(['data'=>$data]);
        }
    }

    //edit
    public function edit(request $request, $kode_penjual){
    	if ($request->ajax()) {
            $data  = Penjual::where('kode_penjual', '=', $kode_penjual)->get();
            return response()->json(['data'=>$data]);
        }
    }

    //update
    public function update(request $request){
    	$form_data = array(
    		'nama_penjual' => $request->nama_penjual,
    		'usia_penjual' => $request->usia_penjual,
    	);
    	$kodePel= Penjual::where('kode_penjual', '=', $request->kode_penjual)->update($form_data);
    	return response()->json(['success'=>'Data successfully updated']);
    }

    public function delete($kode){
    	$is_delete=0;
    	$form_data = array(
    		'is_delete' => $is_delete
    	);
    	$kodePel= Penjual::where('kode_penjual', '=', $kode)->update($form_data);
    	return response()->json(['success'=>'Data berhasil Dihapus']);
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
