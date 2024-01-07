<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wisata_ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wisata_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->integer('bintang');
            $table->date('tanggal');
            $table->text('ulasan');
            $table->string('jenis_kunjungan');
            $table->string('gambar')->nullable();
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
        Schema::dropIfExists('wisata_ratings');
    }
};
