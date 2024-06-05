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
        Schema::create('tb_tukang', function (Blueprint $table) {
            $table->integer('id',)->primary()->autoIncrement();
            $table->string('nama_tukang', length: 50);
            $table->bigInteger('harga_tukang');
            $table->string('foto_tukang', length: 256);
            $table->string('keterangan_tukang', length: 300);
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
