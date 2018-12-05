<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ListstaffPesanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liststaff_pesanan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('liststaff_id')->unsigned();
            $table->integer('pesanan_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('liststaff_pesanan');
    }
}
