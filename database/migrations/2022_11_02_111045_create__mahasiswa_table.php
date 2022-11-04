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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->bigIncrements("idMahasiswa", 255);
            $table->char("idLogin", 255)->nullable();
            $table->string("nama_mahasiswa", 255)->nullable();
            $table->char("nim_mahasiswa", 255)->nullable();
            $table->char("PS_mahasiswa", 255)->nullable();
            $table->char("angkatan_mahasiswa", 255)->nullable();
            $table->char("email_mahasiswa", 255)->nullable();
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
        Schema::dropIfExists('mahasiswa');
    }
};
