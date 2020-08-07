<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->bigInteger('uang')->after('password')->default(0);
            $table->enum('JK', ['L', 'P'])->after('uang');
            $table->string('alamat')->after('JK');
            $table->date('birthdate')->after('alamat');
            $table->string('foto')->after('birthdate')->nullable();
            $table->enum('role', ['admin', 'member', 'user'])->after('foto')->default('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
