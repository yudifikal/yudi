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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id('id')->primary()->autoIncrement(); // Primary key
            $table->date('tgl_pesanan');
            $table->bigInteger('dp_bayar');
            $table->bigInteger('total_bayar');
            $table->bigInteger('sisa_bayar');
            $table->integer('id_kontruksi');
            $table->integer('id_tukang');
            $table->string('email_user');
            $table->integer('id_material');
            $table->timestamps(); // Menambahkan created_at dan updated_at

            // Foreign keys
            $table->foreign('id_kontruksi')->references('tb_konstruksi')->on('id')->onDelete('set null');
            $table->foreign('id_tukang')->references('tb_tukang')->on('id')->onDelete('set null');
            $table->foreign('email_user')->references('users')->on('email')->onDelete('set null');
            $table->foreign('id_material')->references('tb_material')->on('id')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
};
