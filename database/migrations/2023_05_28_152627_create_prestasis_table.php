<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestasis', function (Blueprint $table) {
          $table->id();
          $table->foreignId('siswa_id');
          $table->enum('jenis', [1,2]);
          $table->string('keterangan', 200);
          $table->timestamps();
        });

        // Jenis Prestasi
        // 1 = Akademik
        // 2 = Non Akademik
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestasis');
    }
}
