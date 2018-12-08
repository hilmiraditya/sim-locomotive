<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ListStaff extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ListStaff', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_staff');
            $table->string('email_staff');
            $table->string('jabatan_staff');
            $table->string('unit_staff');
            $table->string('no_telefon_staff');
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
        Schema::dropIfExists('ListStaff');
    }
}
