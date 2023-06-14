<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gurus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('name');
            $table->string('gelar')->nullable();
            $table->bigInteger('nip')->nullable();
            $table->bigInteger('nuptk')->nullable();
            $table->enum('jk', ['L', 'P']);
            $table->string('tempatlahir')->nullable();
            $table->date('tanggallahir')->nullable();
            $table->string('telepon')->nullable();
            $table->text('alamat')->nullable()->default('Jakarta');
            $table->text('foto')->nullable()->default('default.jpg');
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
        Schema::dropIfExists('gurus');
    }
}
