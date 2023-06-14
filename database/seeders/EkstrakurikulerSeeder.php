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
          ],
          [
            'tapel_id' => 1,
            'guru_id' => 2,
            'name' => 'OSIS',
          ],
          [
            'tapel_id' => 1,
            'guru_id' => 3,
            'name' => 'Pramuka',
          ],
          [
            'tapel_id' => 1,
            'guru_id' => 4,
            'name' => 'Paskibra',
          ],
          [
            'tapel_id' => 1,
            'guru_id' => 5,
            'name' => 'Drumband',
          ],
        ])->each(function($abc){
          Ekstrakurikuler::create($abc);
        });
    }
}
