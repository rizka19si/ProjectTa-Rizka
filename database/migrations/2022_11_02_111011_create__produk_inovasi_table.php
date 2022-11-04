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
        Schema::create('produk_inovasi', function (Blueprint $table) {
            $table->bigIncrements("id_Produk", 255);
            $table->char("id_TKT", 255)->nullable();
            $table->char("id_Kategori", 255)->nullable();
            $table->string("judul", 255)->nullable();
            $table->string("segmen_customer", 255)->nullable();
            $table->string("key_partner", 255)->nullable();
            $table->char("nilai_tkt", 255)->nullable();
            $table->char("gambaran_pesaing", 255)->nullable();
            $table->char("uniques_selling_point", 255)->nullable();
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
        Schema::dropIfExists('produk_inovasi');
    }
};
