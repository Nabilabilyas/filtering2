<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjual extends Model
{
    protected $table = 'penjual';
	
   	protected $fillable =['kode_penjual','nama_penjual','usia_penjual','is_delete'];
}
