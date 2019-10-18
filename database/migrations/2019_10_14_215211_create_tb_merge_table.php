<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbMergeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_merge', function (Blueprint $table) {
            $table->increments('id_merge');
            $table->integer('id_karyawan');
            $table->text('in')->nullable();
            $table->text('in_keterangan')->nullable();
            $table->integer('out')->nullable();
            $table->integer('jam_kerja')->nullable();
            $table->integer('r')->nullable();
            $table->integer('jam_pokok')->nullable();
            $table->integer('lembur')->nullable();
            $table->integer('n1_5')->nullable();
            $table->integer('n2')->nullable();
            $table->integer('n3')->nullable();
            $table->integer('n4')->nullable();
            $table->text('jam_lembur')->nullable();
            $table->enum('status_onoff', ['ON', 'OFF'])->nullable();
            $table->date('tanggal');
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
        Schema::dropIfExists('tb_merge');
    }
}
