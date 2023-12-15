<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuTable extends Migration
{
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->unsignedBigInteger('id_menu');
            $table->string('nama_menu', 255)->nullable(false);
            $table->decimal('harga', 10, 2)->nullable(false);
            $table->string('kategori', 50)->nullable(false);
            $table->string('image')->nullable();
            $table->integer('jumlah_stok')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('menu');
    }
};
