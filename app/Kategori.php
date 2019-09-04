<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';//namatable
	//untuk mengatasi masalah mass_asigmnment
	protected $fillable = ['kode_kategori','nama_kategori','biaya_kategori','isdelete'];
	//column,selain create_at update_at
}
