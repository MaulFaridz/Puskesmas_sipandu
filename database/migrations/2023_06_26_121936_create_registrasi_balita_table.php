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
        Schema::create('registrasi_balita', function (Blueprint $table) {
            $table->bigIncrements('reg_balita_id');
            $table->bigInteger('user_id');
            $table->string('kabupaten', 255)->nullable();
            $table->string('kecamatan', 255)->nullable();
            $table->string('desa', 255)->nullable();
            $table->string('posyandu', 255)->nullable();
            $table->string('nama_anak', 255)->nullable();
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan'])->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('nama_ortu',255)->nullable();
            $table->string('klp',255)->nullable();
            $table->enum('hasil_penimbangan', ['januari', 'februari','maret','april','mei','juni','juli','agustus','september','oktober','november','desember'])->nullable();
            $table->string('hsl_penimbangan',255)->nullable();
            $table->string('sirup_besi',255)->nullable();
            $table->enum('s_besi', ['fe1','fe2'])->nullable();
            $table->string('vit_a',255)->nullable();
            $table->enum('v_a', ['1_bln','2_bln'])->nullable();
            $table->string('pmt',255)->nullable();
            $table->string('oralit',255)->nullable();
            $table->string('ket')->nullable();
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
        Schema::dropIfExists('registrasi_balita');
    }
};
