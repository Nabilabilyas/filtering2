<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLokasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lokasi', function (Blueprint $table) {
            $table->string('kode_lokasi', 5);
            $table->string('nama_lokasi', 20);
            $table->integer('kode_pos_lokasi')->nullable(true);
            $table->integer('is_delete');
            $table->primary('kode_lokasi');
            $table->dateTime('tanggal_hapus')->nullable(true);//tanggal hapus
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lokasi');
    }
}
