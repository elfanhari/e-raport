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
          'name' => 'Elfin Pratama',
          'gelar' => 'S.T',
          'nip' => '431209874356980765',
          'nuptk' => '9821476053629418',
          'jk' => 'L',
          'tempatlahir' => 'Banjar',
          'tanggallahir' => '1998-01-09',
          'telepon' => '082480143489',
          'alamat' => 'Lakbok, Ciamis',
        ],
        [
          'user_id' => 2,
          'name' => 'Erik Subianto',
          'gelar' => 'S.Kom',
          'nip' => '512431209874356980',
          'nuptk' => '1568729304658239',
          'jk' => 'L',
          'tempatlahir' => 'Ciamis',
          'tanggallahir' => '1992-01-08',
          'telepon' => '082481793489',
          'alamat' => 'Langensari, Banjar',
        ],
      ])->each(function($admin){
        Admin::create($admin);
      });
    }
}
