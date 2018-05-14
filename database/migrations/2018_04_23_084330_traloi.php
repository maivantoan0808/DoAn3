<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Traloi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('traloi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('anser');
            $table->string('hocsinh');
            $table->string('de');
            $table->string('monhoc');
            $table->string('cauhoi');
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
        Schema::dropIfExists('traloi');
    }
}
