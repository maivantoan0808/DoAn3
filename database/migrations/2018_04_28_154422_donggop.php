<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Donggop extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('donggop', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            $table->longtext('content');
            $table->string('status');
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
       Schema::dropIfExists('donggop');
   }
}
