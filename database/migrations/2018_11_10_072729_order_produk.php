<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderProduk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('OrderProduk', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_produk');
            $table->integer('harga_produk');
            $table->integer('kuantitas_produk');
            $table->string('deskripsi_produk', 200);

            $table->unsignedInteger('produk_id');
            $table->foreign('produk_id')->references('id')->on('produk');

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
        Schema::table('OrderProduk', function (Blueprint $table) {
            $table->dropForeign('orderproduk_produk_id_foreign');
        });
        Schema::dropIfExists('OrderProduk');
    }
}
