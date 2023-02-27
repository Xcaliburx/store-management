<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderHSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order__h', function (Blueprint $table) {
            $table->string('no_order', 10)->primary();
            $table->datetime('tanggal');
            $table->string('kd_outlet', 8);
            $table->boolean('lunas');
            $table->decimal('total_bayar', 18, 2);
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
        Schema::dropIfExists('order__h_s');
    }
}
