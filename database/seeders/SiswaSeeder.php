<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
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
          'user_id' => 9,
          'kelas_id' => 1,
          'name' => 'Elfan  ',
          'jk' => 'L',
          'jenispendaftaran' => '1',
          'diterimapada' => '2020-07-16',
          'nis' => '024342412',
          'nisn' => '3035423424',
          'tempatlahir' => 'Ciamis',
          'tanggallahir' => '2005-01-05',
          'agama' => 1,
          'statusdalamkeluarga' => 1,
          'anak_ke' => 2,
          'alamat' => 'Lakbok',
          'telepon' => '081234567890',
          'namaayah' => 'MUNGALIM',
          'pekerjaanayah' => 'TNI',
          'namaibu' => 'YAYAH',
          'pekerjaanibu' => 'Guru',
          // 'namawali' => 'abc',
          // 'pekerjaanwali' => 'abc',
          'status' => '1'
        ],
        [
          'user_id' => 10,
          'kelas_id' => 1,
          'name' => 'Bunga',
          'jk' => 'P',
          'jenispendaftaran' => '1',
          'diterimapada' => '2020-07-16',
          'nis' => '024342121',
          'nisn' => '3035423409',
          'tempatlahir' => 'Ciamis',
          'tanggallahir' => '2004-05-20',
          'agama' => 1,
          'statusdalamkeluarga' => 1,
          'anak_ke' => 2,
          'alamat' => 'Lakbok',
          'telepon' => '081234567891',
          'namaayah' => 'MUHDIR',
          'pekerjaanayah' => 'PNS',
          'namaibu' => 'SITI',
          'pekerjaanibu' => 'Ibu Rumah Tangga',
          // 'namawali' => 'abc',
          // 'pekerjaanwali' => 'abc',
          'status' => '1'
        ],
        [
          'user_id' => 11,
          'kelas_id' => 2,
          'name' => 'Teguh',
          'jk' => 'L',
          'jenispendaftaran' => '1',
          'diterimapada' => '2021-07-16',
          'nis' => '024342410',
          'nisn' => '3035423429',
          'tempatlahir' => 'Ciamis',
          'tanggallahir' => '2004-10-18',
          'agama' => 2,
          'statusdalamkeluarga' => 2,
          'anak_ke' => 2,
          'alamat' => 'Lakbok',
          'telepon' => '081234567893',
          'namaayah' => 'SARIMAN',
          'pekerjaanayah' => 'Karyawan',
          'namaibu' => 'SARTINAH',
          'pekerjaanibu' => 'Karyawan',
          // 'namawali' => 'abc',
          // 'pekerjaanwali' => 'abc',
          'status' => '1'
        ],
        [
          'user_id' => 12,
          'kelas_id' => 3,
          'name' => 'Alfitka',
          'jk' => 'L',
          'jenispendaftaran' => '2',
          'diterimapada' => '2022-10-16',
          'nis' => '024342098',
          'nisn' => '3030923424',
          'tempatlahir' => 'Ciamis',
          'tanggallahir' => '2004-12-15',
          'agama' => 3,
          'statusdalamkeluarga' => 3,
          'anak_ke' => 1,
          'alamat' => 'Lakbok',
          'telepon' => '081234567850',
          // 'namaayah' => 'abc',
          // 'pekerjaanayah' => 'abc',
          // 'namaibu' => 'abc',
          // 'pekerjaanibu' => 'abc',
          'namawali' => 'INEM',
          'pekerjaanwali' => 'Petani',
          'status' => '1'
        ],
        [
          'user_id' => 13,
          'kelas_id' => 1,
          'name' => 'Andre',
          'jk' => 'L',
          'jenispendaftaran' => '1',
          'diterimapada' => '2021-07-16',
          'nis' => '024342401',
          'nisn' => '3035422401',
          'tempatlahir' => 'Ciamis',
          'tanggallahir' => '2004-10-01',
          'agama' => 2,
          'statusdalamkeluarga' => 2,
          'anak_ke' => 2,
          'alamat' => 'Lakbok',
          'telepon' => '081234567893',
          'namaayah' => 'AYAH Andre',
          'pekerjaanayah' => 'Karyawan',
          'namaibu' => 'IBU Andre',
          'pekerjaanibu' => 'Karyawan',
          'status' => '1'
        ],
        [
          'user_id' => 14,
          'kelas_id' => 1,
          'name' => 'Renal',
          'jk' => 'L',
          'jenispendaftaran' => '1',
          'diterimapada' => '2021-07-16',
          'nis' => '024342402',
          'nisn' => '3035422403',
          'tempatlahir' => 'Ciamis',
          'tanggallahir' => '2004-10-02',
          'agama' => 2,
          'statusdalamkeluarga' => 2,
          'anak_ke' => 2,
          'alamat' => 'Lakbok',
          'telepon' => '081234567893',
          'namaayah' => 'AYAH Renal',
          'pekerjaanayah' => 'Karyawan',
          'namaibu' => 'IBU Renal',
          'pekerjaanibu' => 'Karyawan',
          'status' => '1'
        ],
        [
          'user_id' => 15,
          'kelas_id' => 1,
          'name' => 'Dimas',
          'jk' => 'L',
          'jenispendaftaran' => '1',
          'diterimapada' => '2021-07-16',
          'nis' => '024342404',
          'nisn' => '3035422213',
          'tempatlahir' => 'Ciamis',
          'tanggallahir' => '2004-10-03',
          'agama' => 2,
          'statusdalamkeluarga' => 2,
          'anak_ke' => 2,
          'alamat' => 'Lakbok',
          'telepon' => '081234567893',
          'namaayah' => 'AYAH Dimas',
          'pekerjaanayah' => 'Karyawan',
          'namaibu' => 'IBU Dimas',
          'pekerjaanibu' => 'Karyawan',
          'status' => '1'
        ],
        [
          'user_id' => 16,
          'kelas_id' => 1,
          'name' => 'Rafli',
          'jk' => 'L',
          'jenispendaftaran' => '1',
          'diterimapada' => '2021-07-16',
          'nis' => '024342406',
          'nisn' => '3035422406',
          'tempatlahir' => 'Ciamis',
          'tanggallahir' => '2004-10-06',
          'agama' => 2,
          'statusdalamkeluarga' => 2,
          'anak_ke' => 2,
          'alamat' => 'Lakbok',
          'telepon' => '081234567893',
          'namaayah' => 'AYAH Rafli',
          'pekerjaanayah' => 'Karyawan',
          'namaibu' => 'IBU Rafli',
          'pekerjaanibu' => 'Karyawan',
          'status' => '1'
        ],
        [
          'user_id' => 17,
          'kelas_id' => 1,
          'name' => 'Khikmal',
          'jk' => 'L',
          'jenispendaftaran' => '1',
          'diterimapada' => '2021-07-16',
          'nis' => '024342407',
          'nisn' => '3035422407',
          'tempatlahir' => 'Ciamis',
          'tanggallahir' => '2004-10-07',
          'agama' => 2,
          'statusdalamkeluarga' => 2,
          'anak_ke' => 2,
          'alamat' => 'Lakbok',
          'telepon' => '081234567893',
          'namaayah' => 'AYAH Khikmal',
          'pekerjaanayah' => 'Karyawan',
          'namaibu' => 'IBU Khikmal',
          'pekerjaanibu' => 'Karyawan',
          'status' => '1'
        ],
        [
          'user_id' => 18,
          'kelas_id' => 1,
          'name' => 'Trio',
          'jk' => 'L',
          'jenispendaftaran' => '1',
          'diterimapada' => '2021-07-16',
          'nis' => '024342408',
          'nisn' => '3035422408',
          'tempatlahir' => 'Ciamis',
          'tanggallahir' => '2004-10-08',
          'agama' => 2,
          'statusdalamkeluarga' => 2,
          'anak_ke' => 2,
          'alamat' => 'Lakbok',
          'telepon' => '081234567893',
          'namaayah' => 'AYAH Trio',
          'pekerjaanayah' => 'Karyawan',
          'namaibu' => 'IBU Trio',
          'pekerjaanibu' => 'Karyawan',
          'status' => '1'
        ],
        [
          'user_id' => 19,
          'kelas_id' => 1,
          'name' => 'Dwi',
          'jk' => 'P',
          'jenispendaftaran' => '1',
          'diterimapada' => '2021-07-16',
          'nis' => '024342409',
          'nisn' => '3035422409',
          'tempatlahir' => 'Ciamis',
          'tanggallahir' => '2004-10-09',
          'agama' => 2,
          'statusdalamkeluarga' => 2,
          'anak_ke' => 2,
          'alamat' => 'Lakbok',
          'telepon' => '081234567893',
          'namaayah' => 'AYAH Dwi',
          'pekerjaanayah' => 'Karyawan',
          'namaibu' => 'IBU Dwi',
          'pekerjaanibu' => 'Karyawan',
          'status' => '1'
        ],
        [
          'user_id' => 20,
          'kelas_id' => 1,
          'name' => 'Rifaul',
          'jk' => 'P',
          'jenispendaftaran' => '1',
          'diterimapada' => '2021-07-16',
          'nis' => '024112410',
          'nisn' => '3030422410',
          'tempatlahir' => 'Ciamis',
          'tanggallahir' => '2004-10-10',
          'agama' => 2,
          'statusdalamkeluarga' => 2,
          'anak_ke' => 2,
          'alamat' => 'Lakbok',
          'telepon' => '081234567893',
          'namaayah' => 'AYAH Rifaul',
          'pekerjaanayah' => 'Karyawan',
          'namaibu' => 'IBU Rifaul',
          'pekerjaanibu' => 'Karyawan',
          'status' => '1'
        ],
      ])->each(function($siswa){
        Siswa::create($siswa);
      });
    }
}
