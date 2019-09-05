<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
	
   	protected $fillable =['kode_barang','nama_barang','harga_barang','kode_lokasi','kode_kategori','kode_penjual','is_delete'];
}
