<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiSpiritualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_spirituals', function (Blueprint $table) {
          $table->id();
          $table->foreignId('tapel_id');
          $table->foreignId('siswa_id');
          $table->enum('predikat', ['A', 'B', 'C', 'D'])->nullable();
          $table->text('deskripsi')->nullable();
          $table->timestamps();
        });

        // Nilai
        // 1 = Kurang
        // 2 = Cukup
        // 3 = Baik
        // 4 = Sangat Baik
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai_spirituals');
    }
}
