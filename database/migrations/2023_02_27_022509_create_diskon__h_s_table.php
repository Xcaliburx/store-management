<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiskonHSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diskon__h', function (Blueprint $table) {
            $table->string('no_surat', 10)->primary();
            $table->string('kd_outlet', 8);
            $table->datetime('awal');
            $table->datetime('akhir');
            $table->timestamps();
            $table->foreign('kd_outlet')->references('kd_outlet')->on('outlets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diskon__h_s');
    }
}
