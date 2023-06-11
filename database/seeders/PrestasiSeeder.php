<?php

namespace Database\Seeders;

use App\Models\Prestasi;
use Illuminate\Database\Seeder;

class PrestasiSeeder extends Seeder
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
          'siswa_id' => 1,
          'jenis' => '1',
          'keterangan' => 'Juara 1 Mencintai Dalam Diam',
        ]
      ])->each(function($abc){
        Prestasi::create($abc);
      });
    }
}
