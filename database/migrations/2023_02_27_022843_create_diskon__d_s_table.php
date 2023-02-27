<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiskonDSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diskon__d', function (Blueprint $table) {
            $table->string('kd_produk', 5)->primary();
            $table->string('no_surat', 10);
            $table->decimal('diskon', 5, 2);
            $table->decimal('min', 18, 2);
            $table->decimal('max', 18, 2);
            $table->foreign('no_surat')->references('no_surat')->on('diskon__h');
            $table->foreign('kd_produk')->references('kd_produk')->on('produks');
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
        Schema::dropIfExists('diskon__d_s');
    }
}
