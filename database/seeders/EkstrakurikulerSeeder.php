<?php

namespace Database\Seeders;

use App\Models\Ekstrakurikuler;
use Illuminate\Database\Seeder;

class EkstrakurikulerSeeder extends Seeder
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
            'guru_id' => 1,
            'name' => 'Futsal',
          ]
        ])->each(function($abc){
          Ekstrakurikuler::create($abc);
        });
    }
}
