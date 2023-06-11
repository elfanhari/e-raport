<?php

namespace Database\Seeders;

use App\Models\NilaiSosial;
use Illuminate\Database\Seeder;

class NilaiSosialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      collect([
        [
          'tapel_id' => 1,
          'siswa_id' => 1,
          'predikat' => 'B',
          'deskripsi' => 'Selalu menunjukkan sikap jujur, santun, dan peduli dengan sangat baik, sikap tanggung jawab, disiplin dan toleransi dengan baik, sikap kurang percaya diri dan kurang gotong royong.',
        ]
      ])->each(function($abc){
        NilaiSosial::create($abc);
      });
    }
}
