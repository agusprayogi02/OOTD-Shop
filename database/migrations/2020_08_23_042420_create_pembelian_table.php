<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembelianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelian', function (Blueprint $table) {
            $table->id();
            $table->string('kd_transaksi', 20);
            $table->string('kd_brg', 20);
            $table->foreign('kd_brg')->references('kd_brg')->on('barang');
            $table->bigInteger('jumlah');
            $table->bigInteger('diskon');
            $table->bigInteger('total');
            $table->enum('ready', ['0', '1'])->default('0');
            $table->timestamps();
            $table->foreign('kd_transaksi')->references('kd_transaksi')->on('historys');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembelian');
    }
}
