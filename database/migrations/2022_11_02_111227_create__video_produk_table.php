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
        Schema::create('video_produk', function (Blueprint $table) {
            $table->bigIncrements("idVideo",255);
            $table->char("idProdukInovasi",255)->nullable();
            $table->string("keterangan",255)->nullable();
            $table->char("url",255)->nullable();
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
        Schema::dropIfExists('video_produk');
    }
};
