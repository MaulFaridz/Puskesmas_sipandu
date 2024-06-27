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
        Schema::create('ibu_hamil', function (Blueprint $table) {
            $table->bigIncrements('ibu_hamil_id');
            $table->bigInteger('user_id');
            $table->string('kabupaten', 255)->nullable();
            $table->string('kecamatan', 255)->nullable();
            $table->string('desa', 255)->nullable();
            $table->string('posyandu', 255)->nullable();
            $table->string('nama_ortu', 255)->nullable();
            $table->string('nama_bayi', 255)->nullable();
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan'])->nullable();
            $table->date('tgl_lahir', 255)->nullable();
            $table->date('tgl_meninggal', 255)->nullable();
            $table->string('ket', 255)->nullable();
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
        Schema::dropIfExists('ibu_hamil');
    }
};
