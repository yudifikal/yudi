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
        Schema::create('konsultasi', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_konsultasi');
            $table->time('jam_konsultasi');
            $table->string('nama_konsumen');
            $table->string('alamat_konsumen');
            $table->string('no_hpkonsumen');
            $table->unsignedBigInteger('harga_konsultasi');
            $table->string('status')->default('Menunggu Persetujuan');
            $table->timestamps();

            // Foreign keys
            $table->foreign('nama_konsumen')->references('email')->on('users')->onDelete('no action');
            $table->foreign('alamat_konsumen')->references('email')->on('users')->onDelete('no action');
            $table->foreign('no_hpkonsumen')->references('email')->on('users')->onDelete('no action');
            $table->foreign('harga_konsultasi')->references('id')->on('tb_kontruksi')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('konsultasi');
    }
};
