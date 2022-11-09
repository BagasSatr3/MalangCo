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
        Schema::create('jasa', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('kode_jasa');
            $table->string('nama_jasa');
            $table->string('slug_jasa');
            $table->text('deskripsi_jasa');
            $table->string('foto')->nullable();//banner produknya
            $table->double('jumlah', 12, 2)->default(0);
            $table->double('harga', 12, 2)->default(0);
            $table->string('status');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('jasa');
    }
};
