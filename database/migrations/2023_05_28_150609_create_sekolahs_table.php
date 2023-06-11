<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSekolahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sekolahs', function (Blueprint $table) {
          $table->id();
          $table->string('name');
          $table->string('npsn');
          $table->string('nss')->nullable();
          $table->string('kodepos');
          $table->string('telepon')->nullable();
          $table->text('alamat');
          $table->string('website')->nullable();
          $table->string('email')->nullable();
          $table->string('logo')->default('logo.png');
          $table->string('kepsek');
          $table->string('nipkepsek')->nullable();
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
        Schema::dropIfExists('sekolahs');
    }
}
