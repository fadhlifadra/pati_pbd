<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama')->unique();
            $table->string('longitude');
            $table->string('latitude');
            $table->string('file')->nullable();
            $table->string('keterangan')->nullable();
            $table->boolean('flag');
            $table->integer('user_id')->unsigned();


            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gis');
    }
}
