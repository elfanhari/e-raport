<?php

namespace Database\Seeders;

use App\Models\NilaiSpiritual;
use Illuminate\Database\Seeder;

class NilaiSpiritualSeeder extends Seeder
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
          'predikat' => 'A',
          'deskripsi' => 'Selalu berdoa sebelum dan sesudah melakukan kegiatan, menjalankan ibadah sesuai agamanya dan bersyukur atas nikmat dan karunia Tuhan Yang Maha Esa',
        ]
      ])->each(function($abc){
        NilaiSpiritual::create($abc);
      });
    }
}
