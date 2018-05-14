<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class De extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('de', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('monhoc_id')->unsigned();
            $table->foreign('monhoc_id')->references('id')->on('monhoc')->onDelete('cascade');
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
        Schema::dropIfExists('de');
    }
}
