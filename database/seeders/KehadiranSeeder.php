<?php

namespace Database\Seeders;

use App\Models\Kehadiran;
use Illuminate\Database\Seeder;

class KehadiranSeeder extends Seeder
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
          'sakit' => 3,
        ]
      ])->each(function($abc){
        Kehadiran::create($abc);
      });
    }
}
