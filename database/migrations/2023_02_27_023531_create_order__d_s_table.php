<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order__d', function (Blueprint $table) {
            $table->integer('no_order_dt')->primary();
            $table->string('no_order', 10);
            $table->string('kd_produk', 5);
            $table->integer('jumlah');
            $table->decimal('harga', 18, 2);
            $table->decimal('diskon', 5, 2);
            $table->foreign('no_order')->references('no_order')->on('order__h');
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
        Schema::dropIfExists('order__d_s');
    }
}
