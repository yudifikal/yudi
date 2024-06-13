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
        Schema::create('tb_kontruksi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kontruksi', length: 50);
            $table->bigInteger('harga_kontruksi');
            $table->string('foto_kontruksi', length: 256);
            $table->string('keterangan_kontruksi', length: 300);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_kontruksi');
    }
};
