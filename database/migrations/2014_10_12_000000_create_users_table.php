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
        Schema::create('users_table', function (Blueprint $table) {
            $table->string('nama', length: 50);
            $table->string('email', length: 50)->primary();
            $table->string('password', 255)->change();
            $table->string('alamat', length: 50);
            $table->string('no_hp', length: 50);
            $table->string('role', 50)->default('konsumen'); // Tambahkan kolom role
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
        Schema::table('users', function (Blueprint $table) {
            $table->string('password', 50)->change();
        });
    }
};
