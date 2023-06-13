<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\BagiRaportController;
use App\Http\Controllers\CatatanwalikelasController;
use App\Http\Controllers\CetakRaportController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataAdminController;
use App\Http\Controllers\DataAkunController;
use App\Http\Controllers\DataEkstrakurikulerController;
use App\Http\Controllers\DataGuruController;
use App\Http\Controllers\DataKehadiranController;
use App\Http\Controllers\DataKelasController;
use App\Http\Controllers\DataMapelController;
use App\Http\Controllers\DataNilaiSosialController;
use App\Http\Controllers\DataNilaiSpiritualController;
use App\Http\Controllers\DataPembelajaranController;
use App\Http\Controllers\DataPrestasiController;
use App\Http\Controllers\DataSekolahController;
use App\Http\Controllers\DataSiswaController;
use App\Http\Controllers\DataTapelController;
use App\Http\Controllers\DataWaliSiswaController;
use App\Http\Controllers\NilaiAkhirController;
use App\Http\Controllers\ProfilController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Profiler\Profile;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (User $role) {
  if (Auth::check()) {
      $role = Auth::user()->role;
      return redirect($role . '/dashboard');
  } else {
      return redirect('/login');
  }
})->name('home');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'cekLogin'])->name('login')->middleware('guest');

Route::group(['middleware' => ['auth']], function(){
  Route::get('/{role}/dashboard', [DashboardController::class, 'index']);
  Route::post('/informasi/create', [DashboardController::class, 'store'])->name('informasi.store');
  Route::delete('/informasi/{id}', [DashboardController::class, 'destroy'])->name('informasi.destroy');

  Route::resource('/{role}/datasiswa', DataSiswaController::class);
  Route::resource('/{role}/datawalisiswa', DataWaliSiswaController::class);
  Route::resource('/admin/dataguru', DataGuruController::class);
  Route::resource('/admin/dataadmin', DataAdminController::class);
  Route::resource('/admin/dataakun', DataAkunController::class);
  Route::resource('/admin/datasekolah', DataSekolahController::class);
  Route::put('/admin/datasekolah/logoupdate/{id}', [DataSekolahController::class,'updateLogo'])->name('logosekolah.update');

  Route::resource('/{role}/datakelas', DataKelasController::class);
  Route::resource('/admin/datamapel', DataMapelController::class);
  Route::resource('/{role}/datapembelajaran', DataPembelajaranController::class);

  Route::put('/datapembelajaran/{id}/insertnilai', [DataPembelajaranController::class, 'insertNilai'])->name('datapembelajaran.insertnilai');

  Route::resource('/admin/datatapel', DataTapelController::class);
  Route::resource('/{role}/dataekstrakurikuler', DataEkstrakurikulerController::class);
  Route::post('/anggotaekskul', [DataEkstrakurikulerController::class, 'storeAnggota'])->name('anggotaekskul.store');
  Route::delete('/anggotaekskul/{id}', [DataEkstrakurikulerController::class, 'destroyAnggota'])->name('anggotaekskul.destroy');
  Route::resource('/{role}/dataprestasi', DataPrestasiController::class);
  Route::resource('/{role}/nilaisosial', DataNilaiSosialController::class);
  Route::resource('/{role}/nilaispiritual', DataNilaiSpiritualController::class);
  Route::resource('/{role}/kehadiran', DataKehadiranController::class);
  Route::resource('/{role}/catatan', CatatanwalikelasController::class);

  Route::resource('/{role}/nilaiakhir', NilaiAkhirController::class);
  Route::resource('/{role}/cetakraport', CetakRaportController::class);
  Route::get('/cetakraport/{id}/{nisn}', [CetakRaportController::class, 'print'])->name('cetakraport.print');

  Route::get('/{role}/profil', [ProfilController::class, 'index'])->name('profil.index');
  Route::put('/updateprofil/{id}', [ProfilController::class, 'update'])->name('profil.update');
  Route::put('/updatefoto/{id}', [ProfilController::class, 'updatePhoto'])->name('foto.update');
  Route::put('/updateakun/{id}', [ProfilController::class, 'updateAkun'])->name('akunsaya.update');

  Route::post('/logout', LogoutController::class);

});
