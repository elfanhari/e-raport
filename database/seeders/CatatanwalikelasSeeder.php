<?php

namespace Database\Seeders;

use App\Models\Catatanwalikelas;
use Illuminate\Database\Seeder;

class CatatanwalikelasSeeder extends Seeder
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
          'siswa_id' => 1,
          'catatan' => 'Peringkat ke:- dari 35 Siswa. Teruslah bermain Mobile Legends sampai Anda menjnadi Pro Player!',
        ]
      ])->each(function($abc){
        Catatanwalikelas::create($abc);
      });
    }
}
