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
            $table->string('noidentitas_klien');
            $table->string('alamat_klien',100);
            $table->string('email_klien');
            $table->string('perusahaan_klien')->nullable();
            $table->string('jabatan_klien')->nullable();
            $table->string('notelp_klien');
            $table->string('nowhatsapp_klien');
            $table->string('instagram_klien')->nullable();
            
            //agenda produksi
            $table->date('agenda_produksi');
            $table->string('deskripsi_agenda_produksi',300);

            //jadwal revisi dan serah terima
            $table->date('preview_pertama');
            $table->date('jadwal_1');
            $table->date('jadwal_2');
            $table->date('serah_terimah');

            //catatan lain
            $table->string('catatan_lain',300)->nullable();

            //status pemesanan
            $table->integer('status_pesanan')->default(1);
            // status pesanan : 0 = dibatalkan, 1 = sedang berjalan, 2 = sudah selesai

            //unit produksi
            $table->string('unit_produksi');

            //penginput
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('nama_penginput');

            //kirim email klien
            $table->boolean('isEmailed')->default(0);

            //total harga
            $table->integer('total_harga');
            
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
        Schema::dropIfExists('Pesanan');
    }
}
