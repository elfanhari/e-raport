<?php

namespace Database\Seeders;

use App\Models\Mapel;
use Illuminate\Database\Seeder;

class MapelSeeder extends Seeder
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
          'name' => "Al-Quran Hadist",
          'singkatan' => 'Qurdis',
          'kelompok' => 'A',
        ],
        [
          'tapel_id' => 1,
          'name' => 'Akidah Akhlak',
          'singkatan' => 'Aqidah',
          'kelompok' => 'A',
        ],
        [
          'tapel_id' => 1,
          'name' => 'Fikih',
          'singkatan' => 'Fikih',
          'kelompok' => 'A',
        ],
        [
          'tapel_id' => 1,
          'name' => 'Sejarah Kebudayaan Islam',
          'singkatan' => 'SKI',
          'kelompok' => 'A',
        ],
        [
          'tapel_id' => 1,
          'name' => 'Pendidikan Pancasila dan Kewarganegaraan',
          'singkatan' => 'PPKn',
          'kelompok' => 'A',
        ],
        [
          'tapel_id' => 1,
          'name' => 'Bahasa Indonesia',
          'singkatan' => 'B. Indo',
          'kelompok' => 'A',
        ],
        [
          'tapel_id' => 1,
          'name' => 'Bahasa Arab',
          'singkatan' => 'B. Arab',
          'kelompok' => 'A',
        ],
        [
          'tapel_id' => 1,
          'name' => 'Matematika',
          'singkatan' => 'MTK',
          'kelompok' => 'A',
        ],
        [
          'tapel_id' => 1,
          'name' => 'Ilmu Pengetahuan Alam',
          'singkatan' => 'IPA',
          'kelompok' => 'A',
        ],
        [
          'tapel_id' => 1,
          'name' => 'Ilmu Pengetahuan Sosial',
          'singkatan' => 'IPS',
          'kelompok' => 'A',
        ],
        [
          'tapel_id' => 1,
          'name' => 'Bahasa Inggris',
          'singkatan' => 'B. Inggris',
          'kelompok' => 'A',
        ],
        [
          'tapel_id' => 1,
          'name' => 'Seni Budaya',
          'singkatan' => 'SB',
          'kelompok' => 'B',
        ],
        [
          'tapel_id' => 1,
          'name' => 'Pendidikan Jasmani, Olahraga, dan Kesehatan',
          'singkatan' => 'PJOK',
          'kelompok' => 'B',
        ],
        [
          'tapel_id' => 1,
          'name' => 'Prakarya',
          'singkatan' => 'Prakarya',
          'kelompok' => 'B',
        ],
        [
          'tapel_id' => 1,
          'name' => 'Teknologi Informasi dan Komunikasi',
          'singkatan' => 'TIK',
          'kelompok' => 'B',
        ],
        [
          'tapel_id' => 1,
          'name' => 'Bahasa Jawa',
          'singkatan' => 'B. Jawa',
          'kelompok' => 'B',
        ],
      ])->each(function($mapel){
        Mapel::create($mapel);
      });
    }
}
