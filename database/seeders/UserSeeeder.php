<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      collect([
        [ //1
          'username' => 'mamanadmin',
          'email' => 'maman@gmail.com',
          'role' => 'admin',
          'password' => bcrypt('password'),
        ],
        [ //2
          'username' => 'jamaladmin',
          'email' => 'jamal@gmail.com',
          'role' => 'admin',
          'password' => bcrypt('password'),
        ],
        [ //3
          'username' => 'dianguru',
          'email' => 'dian@gmail.com',
          'role' => 'guru',
          'password' => bcrypt('password'),
        ],
        [ //4
          'username' => 'arifguru',
          'email' => 'arif@gmail.com',
          'role' => 'guru',
          'password' => bcrypt('password'),
        ],
        [ //5
          'username' => 'windaguru',
          'email' => 'winda@gmail.com',
          'role' => 'guru',
          'password' => bcrypt('password'),
        ],
        [ //6
          'username' => 'yasrifanguru',
          'email' => 'yasrifan@gmail.com',
          'role' => 'guru',
          'password' => bcrypt('password'),
        ],
        [ //7
          'username' => 'mungalimwali',
          'email' => 'mungalim@gmail.com',
          'role' => 'walisiswa',
          'password' => bcrypt('password'),
        ],
        [ //8
          'username' => 'muhdirwali',
          'email' => 'muhdir@gmail.com',
          'role' => 'walisiswa',
          'password' => bcrypt('password'),
        ],
        [ //9
          'username' => 'elfansiswa',
          'email' => 'elfan@gmail.com',
          'role' => 'siswa',
          'password' => bcrypt('password'),
        ],
        [ //10
          'username' => 'mellasiswa',
          'email' => 'mella@gmail.com',
          'role' => 'siswa',
          'password' => bcrypt('password'),
        ],
        [ //11
          'username' => 'teguhsiswa',
          'email' => 'teguh@gmail.com',
          'role' => 'siswa',
          'password' => bcrypt('password'),
        ],
        [ //12
          'username' => 'alfitkasiswa',
          'email' => 'alfitka@gmail.com',
          'role' => 'siswa',
          'password' => bcrypt('password'),
        ],
        [ //13
          'username' => 'andre',
          'email' => 'andre@gmail.com',
          'role' => 'siswa',
          'password' => bcrypt('password'),
        ],
        [ //14
          'username' => 'renal',
          'email' => 'renal@gmail.com',
          'role' => 'siswa',
          'password' => bcrypt('password'),
        ],
        [ //15
          'username' => 'dimas',
          'email' => 'dimas@gmail.com',
          'role' => 'siswa',
          'password' => bcrypt('password'),
        ],
        [ //16
          'username' => 'rafli',
          'email' => 'rafli@gmail.com',
          'role' => 'siswa',
          'password' => bcrypt('password'),
        ],
        [ //17
          'username' => 'khikmal',
          'email' => 'khikmal@gmail.com',
          'role' => 'siswa',
          'password' => bcrypt('password'),
        ],
        [ //18
          'username' => 'trio',
          'email' => 'trio@gmail.com',
          'role' => 'siswa',
          'password' => bcrypt('password'),
        ],
        [ //19
          'username' => 'dwi',
          'email' => 'dwi@gmail.com',
          'role' => 'siswa',
          'password' => bcrypt('password'),
        ],
        [ //20
          'username' => 'rifaul',
          'email' => 'rifaul@gmail.com',
          'role' => 'siswa',
          'password' => bcrypt('password'),
        ],
      ])->each(function($user){
        User::create($user);
      });
    }
}
