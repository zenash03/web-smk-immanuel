<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbkelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbkelas', function (Blueprint $table) {
            $table->id('idkelas');
            $table->string('nama_kelas');
            $table->string('idguru');
            $table->integer('idjurusan');
            $table->integer('tingkat');
            $table->tinyText('template_ledger');
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
        Schema::dropIfExists('tbkelas');
    }
}
