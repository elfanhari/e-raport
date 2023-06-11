<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
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
          'user_id' => 3,
          'name' => 'Dian Nugraha',
          'gelar' => 'S.T',
          'nip' => '01342343034',
          'nuptk' => '01312',
          'jk' => 'L',
          'tempatlahir' => 'Ciamis',
          'tanggallahir' => '07-01-05',
          'telepon' => '0234134',
          'alamat' => 'Langensari',
        ],
        [
          'user_id' => 4,
          'name' => 'Arif Rahman Hakim',
          'gelar' => 'S.PD',
          // 'nip' => '01342342134',
          'nuptk' => '01312012',
          'jk' => 'L',
          'tempatlahir' => 'Ciamis',
          'tanggallahir' => '07-01-09',
          'telepon' => '0234134',
          'alamat' => 'Banjar',
        ],
        [
          'user_id' => 5,
          'name' => 'Winda Sri Widiantika',
          'gelar' => 'S.Pd',
          // 'nip' => '01342013034',
          'nuptk' => '013343412',
          'jk' => 'P',
          'tempatlahir' => 'Ciamis',
          'tanggallahir' => '09-01-05',
          'telepon' => '0234134',
          'alamat' => 'Langkap',
        ],
        [
          'user_id' => 6,
          'name' => 'Yasrifan',
          'gelar' => 'S.Kom',
          // 'nip' => '01342343034',
          // 'nuptk' => '01312',
          'jk' => 'L',
          'tempatlahir' => 'Ciamis',
          'tanggallahir' => '07-02-05',
          'telepon' => '0234134',
          'alamat' => 'Bandung',
        ],
      ])->each(function($guru){
        Guru::create($guru);
      });
    }
}
