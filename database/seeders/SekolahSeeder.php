<?php

namespace Database\Seeders;

use App\Models\Sekolah;
use Illuminate\Database\Seeder;

class SekolahSeeder extends Seeder
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
          'name' => 'MTs Tarbiyatul Banat',
          'npsn' => '081832123',
          'nss' => '1011231323',
          'kodepos' => '46385',
          'telepon' => '0265341',
          'email' => 'mts-tarbiyatulbanat@gmail.com',
          'alamat' => 'Jl. Raya Indonesia, Madura',
          'website' => 'www.mts-tarbiyatulbanat.sch.id',
          'kepsek' => 'Agus Suhandi, M.Pd',
          'nipkepsek' => '1232399421',
        ],
      ])->each(function($sekolah){
        Sekolah::create($sekolah);
      });
    }
}
