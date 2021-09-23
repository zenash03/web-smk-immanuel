<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbuser', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelas_id');
            $table->string('name');
            $table->string('username');
            $table->string('password');
            $table->string('role');
            $table->integer('tingkat');
            $table->text('token')->nullable();
            $table->timestamps();

            $table->foreign('kelas_id')->references('idkelas')->on('tbkelas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
