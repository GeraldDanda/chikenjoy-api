<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_karyawan')->nullable();
            $table->string('username', 255)->nullable(false);
            $table->string('password', 255)->nullable(false);
            $table->string('role', 50)->nullable(false);
            $table->timestamps();

            $table->foreign('id_karyawan')->references('id_karyawan')->on('karyawan')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user');
    }
};
