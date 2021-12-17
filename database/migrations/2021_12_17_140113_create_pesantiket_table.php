<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesantiketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesan_tiket', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_tiket', 100)->unique();
            $table->string('email', 100)->unique();
            $table->string('nik', 16)->unique();
            $table->string('nama', 50);
            $table->string('jenis_kelamin', 1);
            $table->string('goldar', 2);
            $table->date('tanggal_pesan');
            $table->string('alamat', 250);
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
        Schema::dropIfExists('pesan_tiket');
    }
}
