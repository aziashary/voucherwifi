<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Transaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->bigIncrements('id_transaksi');
            $table->string('kode_transaksi')->unique();
            $table->string('email')->nullable();
            $table->string('no_telepon')->nullable();
            $table->string('lokasi');
            $table->string('paket');
            $table->integer('kuantiti');
            $table->integer('biaya_admin')->nullable();
            $table->integer('total');
            $table->string('status');
            $table->text('payment_link')->nullable();
            $table->string('payment_method')->nullable();
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
        Schema::dropIfExists('transaksi');
    }
}
