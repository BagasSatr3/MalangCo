<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jasa_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('jasa_id')->unsigned();
            $table->string('foto')->nullable();
            $table->foreign('jasa_id')->references('id')->on('jasa');
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
        Schema::dropIfExists('jasa_images');
    }
};
