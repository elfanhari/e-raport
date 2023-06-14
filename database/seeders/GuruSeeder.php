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
          'name' => 'Budi Santoso',
          'gelar' => 'S.Pd',
          'nip' => '768429153625071928',
          'nuptk' => '5418907265389742',
          'jk' => 'L',
          'tempatlahir' => 'Ciamis',
          'tanggallahir' => '1990-01-05',
          'telepon' => '08231312123',
          'alamat' => 'Langensari, Banjar',
        ],
        [
          'user_id' => 4,
          'name' => 'Dewi Rahmawati',
          'gelar' => 'S.Pd.I',
          // 'nip' => '01342342134',
          'nuptk' => '8742950136758296',
          'jk' => 'P',
          'tempatlahir' => 'Ciamis',
          'tanggallahir' => '1990-01-05',
          'telepon' => '08231312131',
          'alamat' => 'Purwaharja, Banjar',
        ],
        [
          'user_id' => 5,
          'name' => 'Iwan Setiawan',
          'gelar' => 'S.Pd',
          // 'nip' => '01342013034',
          'nuptk' => '2095638471985236',
          'jk' => 'L',
          'tempatlahir' => 'Ciamis',
          'tanggallahir' => '1990-01-05',
          'telepon' => '08231312131',
          'alamat' => 'Langkaplancar, Ciamis',
        ],
        [ //
          'user_id' => 6,
          'name' => 'Siti Rahayu',
          'gelar' => 'S.Pd.I',
          'nip' => '768429153625071928',
          'nuptk' => '8742950136758296',
          'jk' => 'P',
          'tempatlahir' => 'Ciamis',
          'tanggallahir' => '1990-01-05',
          'telepon' => '08231312131',
          'alamat' => 'Cihampelas, Bandung',
        ],
        [ //
          'user_id' => 21,
          'name' => 'Hadi Pratama',
          'gelar' => 'S.T',
          'nip' => '768429153625071928',
          'nuptk' => '8742950136758296',
          'jk' => 'L',
          'tempatlahir' => 'Ciamis',
          'tanggallahir' => '1990-01-05',
          'telepon' => '08231312131',
          'alamat' => 'Cihampelas, Bandung',
        ],
        [ //
          'user_id' => 22,
          'name' => 'Indah Nurul',
          'gelar' => 'S.Pd',
          'nip' => '768429153625071928',
          'nuptk' => '8742950136758296',
          'jk' => 'P',
          'tempatlahir' => 'Ciamis',
          'tanggallahir' => '1990-01-05',
          'telepon' => '08231312131',
          'alamat' => 'Cihampelas, Bandung',
        ],
        [ //
          'user_id' => 23,
          'name' => 'Slamet Riyadi',
          'gelar' => 'S.Pd.I',
          'nip' => '768429153625071928',
          'nuptk' => '8742950136758296',
          'jk' => 'L',
          'tempatlahir' => 'Ciamis',
          'tanggallahir' => '1990-01-05',
          'telepon' => '08231312131',
          'alamat' => 'Cihampelas, Bandung',
        ],
        [ //
          'user_id' =>24,
          'name' => 'Tri Wulandari',
          'gelar' => 'S.Pd.I',
          'nip' => '768429153625071928',
          'nuptk' => '8742950136758296',
          'jk' => 'P',
          'tempatlahir' => 'Ciamis',
          'tanggallahir' => '1990-01-05',
          'telepon' => '08231312131',
          'alamat' => 'Cihampelas, Bandung',
        ],
        [ //
          'user_id' => 25,
          'name' => 'Ahmad Subagyo',
          'gelar' => 'S.Pd',
          'nip' => '768429153625071928',
          'nuptk' => '8742950136758296',
          'jk' => 'L',
          'tempatlahir' => 'Ciamis',
          'tanggallahir' => '1990-01-05',
          'telepon' => '08231312131',
          'alamat' => 'Cihampelas, Bandung',
        ],
        [ //
          'user_id' => 26,
          'name' => 'Titin Wulandari',
          'gelar' => 'S.Pd',
          'nip' => '768429153625071928',
          'nuptk' => '8742950136758296',
          'jk' => 'P',
          'tempatlahir' => 'Ciamis',
          'tanggallahir' => '1990-01-05',
          'telepon' => '08231312131',
          'alamat' => 'Cihampelas, Bandung',
        ],
      ])->each(function($guru){
        Guru::create($guru);
      });
    }
}
