<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pesanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Pesanan', function (Blueprint $table) {
            $table->increments('id');
            //biodata klien
            $table->string('nama_klien');
            $table->string('noktp_klien');
            $table->string('alamat_klien',100);
            $table->string('email_klien');
            $table->string('perusahaan_klien')->default('-');
            $table->string('jabatan_klien')->default('-');
            $table->string('notelp_klien');
            $table->string('nowhatsapp_klien');
            $table->string('instagram_klien')->default('-');
            $table->string('facebook_klien')->default('-');
            $table->string('twitter_klien')->default('-');
            $table->string('foto_klien');
            
            //agenda produksi
            $table->date('tanggal_produksi');
            $table->string('deskripsi_agenda_produksi',300);

            //jadwal revisi dan serah terima
            $table->date('preview_pertama');
            $table->date('jadwal_1');
            $table->date('jadwal_2');
            $table->date('serah_terimah');

            //catatan lain
            $table->string('catatan_lain',300);

            //status pemesanan
            $table->integer('status_pesanan');

            //unit produksi
            $table->string('unit_produksi');

            //penginput
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('nama_penginput');
            
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
        Schema::table('Pesanan', function (Blueprint $table) {
            $table->dropForeign('pesanan_user_id_foreign');
        });
        Schema::dropIfExists('Pesanan');
    }
}
