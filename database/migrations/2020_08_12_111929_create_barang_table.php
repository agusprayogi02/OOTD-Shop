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
            $table->string('kd_brg', 20)->primary();
            $table->foreignId('id')->constrained('users');
            $table->foreignId('kd_ktgr')->constrained('kategori', 'kd_ktgr');
            $table->string('nama');
            $table->integer('harga');
            $table->string('foto', 50)->nullable();
            $table->integer('stok')->default(1)->nullable();
            $table->double('diskon', 8, 2)->nullable();
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
