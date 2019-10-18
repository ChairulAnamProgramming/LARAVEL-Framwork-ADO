<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email', 100)->unique();
            $table->string('nik');
            $table->date('tmk');
            $table->string('ktp');
            $table->string('tmpt_lhr');
            $table->date('tgl_lhr');
            $table->string('alamat');
            $table->string('id_bagian');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', ['Super Admin', 'Admin', 'User']);
            $table->text('image');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
