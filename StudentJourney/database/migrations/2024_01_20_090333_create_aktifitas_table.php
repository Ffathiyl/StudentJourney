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
        Schema::create('aktifitas', function (Blueprint $table) {
            $table->id();
            $table->string('Deskripsi');
            $table->foreignId('admin_id')->constrained();
            $table->foreignId('mahasiswa_id')->constrained();
            $table->integer('Jam_Plus')->nullable();
            $table->integer('Jam_Minus')->nullable();
            $table->date('Tanggal');
            $table->string('Status')->nullable();
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
        Schema::dropIfExists('aktifitas');
    }
};
