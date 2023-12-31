<?php

namespace Database\Seeders;

use App\Models\Tapel;
use Illuminate\Database\Seeder;

class TapelSeeder extends Seeder
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
          'tahun_pelajaran' => '2023/2024',
          'semester' => 1,
          'tempatbagiraport' => 'Ciamis',
          'tanggalbagiraport' => '2022-12-23'
        ],
        [
          'tahun_pelajaran' => '2023/2024',
          'semester' => 2,
          'tempatbagiraport' => 'Ciamis',
          'tanggalbagiraport' => '2024-06-23'
        ],
      ])->each(function($tapel){
        Tapel::create($tapel);
      });
    }
}
