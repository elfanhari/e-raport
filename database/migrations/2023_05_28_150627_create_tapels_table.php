<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTapelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tapels', function (Blueprint $table) {
            $table->id();
            $table->string('tahun_pelajaran');
            $table->enum('semester', ['1', '2']);
            $table->date('tanggalbagiraport')->nullable();
            $table->string('tempatbagiraport')->nullable();
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
        Schema::dropIfExists('tapels');
    }
}
