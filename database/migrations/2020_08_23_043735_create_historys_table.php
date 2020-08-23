<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historys', function (Blueprint $table) {
            $table->id('kd_his');
            $table->string('kd_transaksi', 20);
            $table->foreignId('id')->constrained('users');
            $table->bigInteger('subTotal');
            $table->bigInteger('total');
            $table->bigInteger('diskon');
            $table->bigInteger('delivery');
            $table->enum('status', ['0', '1', '2']);
            $table->timestamps();
            // $table->foreign('kd_transaksi')->references('kd_transaksi')->on('pembelian');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historys');
    }
}
