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
        Schema::create('pesanan_tukang', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_pesanan');
            $table->bigInteger('total_bayar');
            $table->string('email_konsumen');
            $table->string('pesanan')->nullable();
            $table->integer('hari')->nullable();
            $table->unsignedBigInteger('id_tukang');
            $table->string('status')->default('Menunggu Pembayaran');
            $table->date('tanggal_mulai'); // Add this line
            $table->date('tanggal_selesai'); // Add this line
            $table->timestamps();

            // Foreign keys
            $table->foreign('id_tukang')->references('id')->on('tb_tukang')->onDelete('no action');
            $table->foreign('email_konsumen')->references('email')->on('users')->onDelete('no action');
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
