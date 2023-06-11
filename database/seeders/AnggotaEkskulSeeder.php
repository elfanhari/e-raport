<?php

namespace Database\Seeders;

use App\Models\AnggotaEkskul;
use Illuminate\Database\Seeder;

class AnggotaEkskulSeeder extends Seeder
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
          'ekstrakurikuler_id' => 1,
          'siswa_id' => 1,
          'predikat' => 'A',
        ]
      ])->each(function($abc){
        AnggotaEkskul::create($abc);
      });
    }
}
