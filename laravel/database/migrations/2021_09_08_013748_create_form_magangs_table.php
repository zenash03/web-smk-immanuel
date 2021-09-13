<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormMagangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_magangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perusahaan');
            $table->integer('kouta');
            $table->integer('slot_tersedia');
            $table->text('alamat');
            $table->string('telp');
            $table->string('pic');
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('form_magangs');
    }
}
