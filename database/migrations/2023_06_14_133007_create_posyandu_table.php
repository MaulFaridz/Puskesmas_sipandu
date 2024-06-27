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
        // Schema::create('posyandu', function (Blueprint $table) {
        //     $table->id('id_posyandu');
        //     $table->string('nama_ortu');
        //     $table->string('nama_bayi');
        //     $table->string('jenis_kelamin');
        //     $table->string('tanggal_lahir');
        //     $table->string('tanggal_meninggal');
        //     $table->string('keterangan');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posyandu');
    }
};

// <?php

// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// return new class extends Migration
// {
//     /**
//      * Run the migrations.
//      *
//      * @return void
//      */
//     public function up()
//     {
//         Schema::create('posyandu', function (Blueprint $table) {
//             $table->id('id_posyandu');
//             $table->string('nama_ortu');
//             $table->string('nama_bayi');
//             $table->string('jenis_kelamin');
//             $table->string('tanggal_lahir');
//             $table->string('tanggal_meninggal');
//             $table->string('keterangan');
//         });
//     }

//     /**
//      * Reverse the migrations.
//      *
//      * @return void
//      */
//     public function down()
//     {
//         Schema::dropIfExists('posyandu');
//     }
// };
