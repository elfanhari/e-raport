<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('walis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('siswa_id');
            $table->string('name');
            $table->enum('jk', ['L', 'P']);
            $table->enum('sebagai', [1,2,3]);
            $table->text('foto')->default('default.jpg');
            $table->timestamps();

            // Sebagai
            // 1 = Ayah
            // 2 = Ibu
            // 3 = Wali
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('walis');
    }
}
