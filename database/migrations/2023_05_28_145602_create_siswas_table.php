<?php

use Faker\Provider\ar_EG\Text;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {

            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('kelas_id');
            $table->string('name');
            $table->enum('jk', ['L', 'P']);
            $table->enum('jenispendaftaran', ['1','2']); //1: Siswa Baru - 2: Perpindahan
            $table->date('diterimapada');
            $table->string('nis')->unique();
            $table->string('nisn')->unique();
            $table->string('tempatlahir');
            $table->date('tanggallahir');
            $table->enum('agama', ['1','2','3','4','5']);
            $table->enum('statusdalamkeluarga', ['1','2','3']);
            $table->bigInteger('anak_ke');
            $table->text('alamat');
            $table->string('telepon')->nullable();
            $table->string('namaayah')->nullable();
            $table->string('namaibu')->nullable();
            $table->string('pekerjaanayah')->nullable();
            $table->string('pekerjaanibu')->nullable();
            $table->string('namawali')->nullable();
            $table->string('pekerjaanwali')->nullable();
            $table->text('foto')->default('default.jpg');
            $table->enum('status', ['1','2','3']);
            $table->timestamps();

            // Jenis Pendaftaran
            // 1 = Siswa Baru
            // 2 = Pindahan

            // Agama
            // 1 = Islam
            // 2 = Protestan
            // 3 = Katolik
            // 4 = Hindu
            // 5 = Budha

            // Status Dalam Keluarga
            // 1 = Anak Kandung
            // 2 = Anak Angkat
            // 3 = Anak Tiri

            // Status
            // 1 = Aktif
            // 2 = Non-Aktif
            // 3 = Lulus
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswas');
    }
}
