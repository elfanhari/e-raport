<?php

namespace Database\Seeders;

use App\Models\Wali;
use Illuminate\Database\Seeder;

class WaliSeeder extends Seeder
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
          'user_id' => 7,
          'siswa_id' => 1,
          'name' => 'MUNGALIM',
          'jk' => 'L',
          'sebagai' => 1,
        ],
        [
          'user_id' => 8,
          'siswa_id' => 2,
          'name' => 'MUHDIR',
          'jk' => 'L',
          'sebagai' => 1,
        ],
      ])->each(function($wali){
        Wali::create($wali);
      });
    }
}
