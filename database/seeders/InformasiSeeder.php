<?php

namespace Database\Seeders;

use App\Models\Informasi;
use Illuminate\Database\Seeder;

class InformasiSeeder extends Seeder
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
            'judul' => 'Perbaikan Data',
            'isi' => 'Untuk Wali Kelas dimohon untuk segera melakukan perbaikan Data Siswa. Terima kasih.',
            'untuk' => 'guru',
          ],
          [
            'user_id' => 2,
            'judul' => 'Keamanan Akun',
            'isi' => 'Untuk Seluruh Pengguna, dimohon untuk segera mengganti password akun. Terima kasih.',
            'untuk' => 'siswa',
          ],
        ])->each(function($informasi){
          Informasi::create($informasi);
        });
    }
}
