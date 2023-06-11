<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
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
          'user_id' => 1,
          'name' => 'Maman Suparman',
          'gelar' => 'S.T',
          'nip' => '01342343234',
          'nuptk' => '01332',
          'jk' => 'L',
          'tempatlahir' => 'Ciamis',
          'tanggallahir' => '06-01-05',
          'telepon' => '0234234',
          'alamat' => 'Lakbok',
        ],
        [
          'user_id' => 2,
          'name' => 'Jamaludin',
          'gelar' => 'S.Kom',
          'nip' => '01342343214',
          'nuptk' => '01332',
          'jk' => 'L',
          'tempatlahir' => 'Ciamis',
          'tanggallahir' => '08-01-05',
          'telepon' => '0234234',
          'alamat' => 'Lakbok',
        ],
      ])->each(function($admin){
        Admin::create($admin);
      });
    }
}
