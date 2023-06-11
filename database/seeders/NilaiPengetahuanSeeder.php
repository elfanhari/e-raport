<?php

namespace Database\Seeders;

use App\Models\NilaiPengetahuan;
use Illuminate\Database\Seeder;

class NilaiPengetahuanSeeder extends Seeder
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
          'pembelajaran_id' => 1,
          'siswa_id' => 1,
          'nilai' => '90',
        ],
        [
          'pembelajaran_id' => 2,
          'siswa_id' => 1,
          'nilai' => '90',
        ],
        [
          'pembelajaran_id' => 3,
          'siswa_id' => 1,
          'nilai' => '90',
        ],
        [
          'pembelajaran_id' => 4,
          'siswa_id' => 1,
          'nilai' => '90',
        ],
        [
          'pembelajaran_id' => 5,
          'siswa_id' => 1,
          'nilai' => '90',
        ],
        [
          'pembelajaran_id' => 6,
          'siswa_id' => 1,
          'nilai' => '90',
        ],
        [
          'pembelajaran_id' => 7,
          'siswa_id' => 1,
          'nilai' => '90',
        ],
        [
          'pembelajaran_id' => 8,
          'siswa_id' => 1,
          'nilai' => '90',
        ],
        [
          'pembelajaran_id' => 9,
          'siswa_id' => 1,
          'nilai' => '90',
        ],
        [
          'pembelajaran_id' => 10,
          'siswa_id' => 1,
          'nilai' => '90',
        ],
        [
          'pembelajaran_id' => 11,
          'siswa_id' => 1,
          'nilai' => '90',
        ],
        [
          'pembelajaran_id' => 12,
          'siswa_id' => 1,
          'nilai' => '90',
        ],
        [
          'pembelajaran_id' => 13,
          'siswa_id' => 1,
          'nilai' => '90',
        ],
        [
          'pembelajaran_id' => 14,
          'siswa_id' => 1,
          'nilai' => '90',
        ],
        [
          'pembelajaran_id' => 15,
          'siswa_id' => 1,
          'nilai' => '90',
        ],
        [
          'pembelajaran_id' => 16,
          'siswa_id' => 1,
          'nilai' => '90',
        ],
      ])->each(function($Npeng){
        NilaiPengetahuan::create($Npeng);
      });
    }
}
