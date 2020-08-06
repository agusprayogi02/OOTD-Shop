<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id('kd_brg');
            $table->string('nama', 150);
            $table->integer('harga');
            $table->string('foto', 50);
            $table->integer('stok');
            $table->double('diskon', 8, 2);
            // $table->foreign('uid', 'fk_uid')->references('uid')->on('users');
            // $table->foreign('kd_kategori', 'fk_kategori')->references('kd_kategori')->on('kategori');
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
