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
            $table->string('kd_transaksi', 20)->primary();
            $table->foreignId('id')->constrained('users');
            $table->bigInteger('subTotal');
            $table->bigInteger('total');
            $table->bigInteger('diskon');
            $table->bigInteger('delivery');
            $table->enum('status', ['0', '1', '2']);
            $table->enum('user', ['0', '1'])->nullable()->default('1');
            $table->enum('member', ['0', '1'])->nullable()->default('1');
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
        Schema::dropIfExists('historys');
    }
}
