<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Monhoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('monhoc', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longtext('gioithieu')->nullable();
            $table->string('Hinh');
            $table->integer('id_khoa')->unsigned();
            $table->foreign('id_khoa')->references('id')->on('khoahoc')->onDelete('cascade');
            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
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
        //
      Schema::dropIfExists('monhoc');
  }
}
