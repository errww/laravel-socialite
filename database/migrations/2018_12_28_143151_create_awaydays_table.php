<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAwaydaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('awaydays', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->string('judul');
            $table->date('jadwal_match');
            $table->string('lokasi_match');
            $table->decimal('biaya',15,2);
            $table->integer('slot');
            $table->dateTime('tutup_pendaftaran');
            $table->text('keterangan');
            $table->enum('status_aktif', ['open', 'close']);
            $table->integer('user_id');
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
        Schema::dropIfExists('awaydays');
    }
}
