<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $table = 'lokasi';
	
   	protected $fillable =['kode_lokasi','nama_lokasi','kode_alamat_lokasi','is_delete'];
}

