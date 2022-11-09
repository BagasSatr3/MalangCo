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
        Schema::create('booking_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('jasa_id')->unsigned();
            $table->integer('booking_id')->unsigned();
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->double('harga', 12, 2)->default(0);
            $table->double('subtotal', 12, 2)->default(0);
            $table->foreign('booking_id')->references('id')->on('cart');
            $table->foreign('jasa_id')->references('id')->on('produk');
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
        Schema::dropIfExists('booking_details');
    }
};
