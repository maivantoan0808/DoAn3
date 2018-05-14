<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QuizTest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('quiz_test', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('monhoc_id')->unsigned();
            $table->foreign('monhoc_id')->references('id')->on('monhoc')->onDelete('cascade');
            $table->integer('de_id')->unsigned();
            $table->foreign('de_id')->references('id')->on('de')->onDelete('cascade');
            $table->integer('cauhoi_id')->unsigned();
            $table->foreign('cauhoi_id')->references('id')->on('cauhoi')->onDelete('cascade');
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
     Schema::dropIfExists('quiz_test');
 }
}
