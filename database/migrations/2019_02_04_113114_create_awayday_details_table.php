<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAwaydayDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('awayday_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->integer('awayday_id');
            $table->integer('user_id');
            $table->string('kode_daftar')->unique();
            $table->enum('status_pendaftaran',['belum_konfirmasi','proses','berhasil','gagal']);
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
        Schema::dropIfExists('awayday_details');
    }
}
