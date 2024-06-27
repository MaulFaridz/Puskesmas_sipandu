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
        Schema::create('desa', function (Blueprint $table) {
            $table->bigIncrements('desa_id', 255);
            $table->string('posyandu',255)->nullable();
            $table->string('alamat',255)->nullable();
            $table->string('bangunan',255)->nullable();
            $table->string('fk_panembangan',255)->nullable();
            $table->string('jumlah_kader',255)->nullable();
            $table->string('rerata_cakupan',255)->nullable();
            $table->string('cakupan_komulatif_kia',255)->nullable();
            $table->string('cakupan_komulatif_kb',255)->nullable();
            $table->string('ck_imunisasi',255)->nullable();
            $table->string('keg_posyandu',255)->nullable();
            $table->string('dana_sehat',255)->nullable();
            $table->string('sk_posyandu',255)->nullable();
            $table->string('strata_posyandu',255)->nullable();
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
        Schema::dropIfExists('desa');
    }
};
