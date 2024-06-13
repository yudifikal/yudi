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
        Schema::create('pesanan_material', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_pesanan');
            $table->bigInteger('total_bayar');
            $table->string('nama_konsumen');
            $table->unsignedBigInteger('id_material');
            $table->string('alamat_konsumen');
            $table->string('no_hpkonsumen');
            $table->string('status')->default('Menunggu Pembayaran');
            $table->timestamps();

            // Foreign keys
            $table->foreign('id_material')->references('id')->on('tb_material')->onDelete('no action');
            $table->foreign('nama_konsumen')->references('email')->on('users')->onDelete('no action');
            $table->foreign('alamat_konsumen')->references('email')->on('users')->onDelete('no action');
            $table->foreign('no_hpkonsumen')->references('email')->on('users')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
