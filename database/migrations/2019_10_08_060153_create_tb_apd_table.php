<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbApdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_apd', function (Blueprint $table) {
            $table->increments('id_apd');
            $table->integer('id_barang')->nullable();
            $table->integer('id_karyawan')->nullable();
            $table->date('tanggal')->nullable();
            $table->integer('jumlah_pinjam')->nullable();
            $table->integer('jumlah_terima')->nullable();
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
        Schema::dropIfExists('tb_apd');
    }
}
