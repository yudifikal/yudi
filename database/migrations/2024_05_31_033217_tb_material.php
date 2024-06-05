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
        Schema::create('tb_material', function (Blueprint $table) {
            $table->integer('id',)->primary()->autoIncrement();
            $table->string('nama_material', length: 50);
            $table->bigInteger('harga_material');
            $table->string('foto_material', length: 256);
            $table->string('keterangan_material', length: 300);
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
