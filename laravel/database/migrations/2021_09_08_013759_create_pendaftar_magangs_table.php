<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftarMagangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftar_magangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('magang_id');
            $table->string('nama');
            $table->string('username');
            $table->enum('disetujui', ['y', 'n'])->nullable();
            $table->foreignId('penyetuju_id')->nullable();
            $table->string('tanggal_disetujui')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('tbuser');
            $table->foreign('penyetuju_id')->references('id')->on('tbadmin');
            $table->foreign('magang_id')->references('id')->on('form_magangs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendaftar_magangs');
    }
}
