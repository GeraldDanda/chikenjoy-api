<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailTransaksiTable extends Migration
{
    public function up()
    {
        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->unsignedBigInteger('id_transaksi');
            $table->unsignedBigInteger('id_menu');
            $table->unsignedBigInteger('id_user');
            $table->integer('jumlah_pesanan')->nullable(false);
            $table->decimal('total_harga', 10, 2)->nullable(false);
            $table->string('metode_pembayaran', 50)->nullable(false);
            $table->timestamp('waktu_transaksi')->nullable();
            $table->timestamps();

            $table->foreign('id_menu')->references('id_menu')->on('menu')->onDelete('cascade');
            $table->foreign('id_user')->references('id_user')->on('user')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_transaksi');
    }
};
