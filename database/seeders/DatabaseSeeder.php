<?php

namespace Database\Seeders;

use App\Models\AnggotaEkskul;
use App\Models\NilaiKeterampilan;
use App\Models\NilaiPengetahuan;
use App\Models\NilaiSpiritual;
use App\Models\Sekolah;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
          UserSeeeder::class,
          AdminSeeder::class,
          GuruSeeder::class,
          SiswaSeeder::class,
          WaliSeeder::class,
          TapelSeeder::class,
          KelasSeeder::class,
          MapelSeeder::class,
          SekolahSeeder::class,
          PembelajaranSeeder::class,
          InformasiSeeder::class,
          NilaiPengetahuanSeeder::class,
          NilaiKeterampilanSeeder::class,
          NilaiPtsSeeder::class,
          NilaiPasSeeder::class,
          NilaiAkhirSeeder::class,
          EkstrakurikulerSeeder::class,
          AnggotaEkskulSeeder::class,
          PrestasiSeeder::class,
          CatatanwalikelasSeeder::class,
          NilaiSosialSeeder::class,
          NilaiSpiritualSeeder::class,
          KehadiranSeeder::class,
        ]);
    }
}
