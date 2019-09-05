<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->string('kode_barang', 5);
            $table->primary('kode_barang');
            $table->string('nama_barang', 20);
            $table->integer('harga_barang')->nullable(true);
            $table->string('kode_lokasi', 5);
            $table->string('kode_kategori', 5);
            $table->string('kode_penjual', 5);
            $table->foreign('kode_lokasi')->references('kode_lokasi')->on('lokasi');
            $table->foreign('kode_kategori')->references('kode_kategori')->on('kategori');
            $table->foreign('kode_penjual')->references('kode_penjual')->on('penjual');
            $table->integer('is_delete');
            $table->dateTime('tanggal_hapus')->nullable(true);
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
        Schema::dropIfExists('barang');
    }
}
