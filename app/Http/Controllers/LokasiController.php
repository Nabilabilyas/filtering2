<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lokasi;

class LokasiController extends Controller
{
    public function index(){
        if (request()->ajax()) {
            return datatables()->of(Lokasi::all())
            ->addColumn('edit',function($data){
                $button = '<button type="button" name="edit" id="'.$data->kode_lokasi.'" class="edit btn btn-primary btn-sm">Edit</button>';
                return $button;
            })
            ->addColumn('delete',function($data){
                if ($data->is_delete == 1) {
                    $button = '<button type="button" name="delete" id="'.$data->kode_lokasi.'" class="delete btn btn-danger btn-sm">Delete</button>';
                    return $button;
                    
                }else{
                    
                }
            })
            ->addColumn('detail',function($data){
                $button = '<button type="button" name="detail" id="'.$data->kode_lokasi.'" class="detail btn btn-success btn-sm">Detail</button>';
                return $button;
            })
            ->addColumn('status',function($data){
                if ($data->is_delete == 0) {
                    $button = '<button type="button" name="aktif" id="'.$data->kode_lokasi.'" class="aktif btn btn-outline-success btn-sm">Aktifkan</button>'.'-'.'<button type="button" name="nonaktif" id="'.$data->kode_lokasi.'" class="nonaktif btn btn-outline-secondary btn-sm">Nonaktif</button>';
                    return $button;                 
                }else{
                    $button = '<button type="" name="aktif" id="'.$data->kode_lokasi.'" class="btn btn-outline-info btn-sm">Aktif</button>';
                    return $button;
                }
            })
            ->rawColumns(array("edit","delete","detail","status"))
            ->make(true);
        }
        return view('Lokasi.index_lokasi');
    }

	public function add(Request $request){
		$is_delete = 1;
    	$form_data = array(
    		'kode_lokasi' 	 => $request->kode_lokasi,
    		'nama_lokasi' 	  => $request->nama_lokasi,
    		'kode_pos_lokasi'    => $request->kode_pos_lokasi,
    		'is_delete'	 	  => $is_delete
    	);
    	$kodelok = lokasi::where('kode_lokasi','=', $request->kode_lokasi)->get();
    	$count = count($kodelok);
    	// echo $count;
    	// die();

    	if ($count == 1) {
    		return response()->json(['error'=>'Kode lokasi sudah terpakai']);
    	}else{
    		Lokasi::create($form_data);
    		return response()->json(['success'=>'Data lokasi ditambah.']);
    	}
    }

     public function detail(Request $request,$id){
        if ($request->ajax()) {
        $data = Lokasi::where('kode_lokasi','=', $request->id)->get();
        return response()->json(['data'=>$data]);
        }
    }

        public function delete($id){
        $is_delete = 0;
        $form_data = array(
            'is_delete'      => $is_delete
        );

        Lokasi::where('kode_lokasi','=', $id)->update($form_data);

        return response()->json(['success'=>'Data berhasil dihapus.']);
    }

        public function aktif($id){
        $is_delete = 1;
        $form_data = array(
            'is_delete'      => $is_delete
        );

        Lokasi::where('kode_lokasi','=', $id)->update($form_data);

        return response()->json(['success'=>'Data berhasil dihapus.']);
    }

      public function update(Request $request)
    {
        // $isdelete = 1;
        $form_data = array(
            'kode_lokasi' => $request->kode_lokasi,
            'nama_lokasi' => $request->nama_lokasi,
            'kode_pos_lokasi'    => $request->kode_pos_lokasi,
        );

        Lokasi::where('kode_lokasi','=', $request->kode_lokasi)->update($form_data);

        return response()->json(['success'=>'Data berhasil diupdate.']);
    }
    public function edit(Request $request,$id){
        if ($request->ajax()) {
            $data = Lokasi::where('kode_lokasi','=', $request->id)->get();
            return response()->json(['data'=>$data]);
        }
    }
}
