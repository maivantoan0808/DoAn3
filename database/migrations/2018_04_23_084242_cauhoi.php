<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cauhoi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('cauhoi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->longtext('content');
            $table->string('A');
            $table->string('B');
            $table->string('C');
            $table->string('D');
            $table->string('answer');
            $table->string('Hinh')->nullable();
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
        Schema::dropIfExists('cauhoi');
    }
}
