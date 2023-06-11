<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePembelajaranRequest;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\NilaiAkhir;
use App\Models\NilaiKeterampilan;
use App\Models\NilaiPas;
use App\Models\NilaiPengetahuan;
use App\Models\NilaiPts;
use App\Models\Pembelajaran;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Validation\ValidationException;

class DataPembelajaranController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    if(auth()->user()->role === 'walisiswa' || auth()->user()->role === 'siswa'){
        abort('403');
    } else{
      if(auth()->user()->role === 'admin'){
        $pembelajaran = Pembelajaran::get();
      } else{
        $pembelajaran = Pembelajaran::where('guru_id', auth()->user()->guru->id)->get();
      }
        $nilai = NilaiPas::select('pembelajaran_id')
          ->union(NilaiPts::select('pembelajaran_id'))
          ->union(NilaiPengetahuan::select('pembelajaran_id'))
          ->union(NilaiKeterampilan::select('pembelajaran_id'))
          ->get();
        $role = auth()->user()->role;
        return view('pages.datapembelajaran.index', compact('pembelajaran', 'nilai', 'role'));
    }
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('pages.datapembelajaran.create', [
      'mapel' => Mapel::get(),
      'guru' => Guru::get(),
      'kelas' => Kelas::get(),
      'pembelajaran' => Pembelajaran::get(),
      'role' => auth()->user()->role,
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StorePembelajaranRequest $request, $role)
  {

    $kelas = Pembelajaran::where('kelas_id', $request->kelas_id)->get()->pluck('mapel_id');
    $mapel_id = Mapel::whereIn('id', $kelas)->get()->pluck('id');
    $reqMapel_id = intval($request->mapel_id);

    if ($mapel_id->contains($reqMapel_id)) {
      throw ValidationException::withMessages([
        'mapel_id' => 'Pembelajaran pada kelas yang dipilih sudah ada ',
      ]);
    } else {
      $pembelajaran = Pembelajaran::create($request->all());
      $pembelajaran;
      return redirect(route('datapembelajaran.index', $role))->withInfo('Data Pembelajaran: <b>' . $pembelajaran->mapel->singkatan . ' ' . $pembelajaran->kelas->name . '</b> berhasil ditambahkan!');
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  // $nilaiPas = NilaiPas::where('pembelajaran_id', $id)->get();
  public function show($role, $id)
  {
    $pembelajaran = Pembelajaran::find($id);
    return view('pages.datapembelajaran.show', [

      'pembelajaran' => $pembelajaran,
      'siswa' => Siswa::where('kelas_id', $pembelajaran->kelas_id)->get(),

      'nilaiPengetahuan' => NilaiPengetahuan::where('pembelajaran_id', $id)->get(),
      'nilaiKeterampilan' => NilaiKeterampilan::where('pembelajaran_id', $id)->get(),
      'nilaiPts' => NilaiPts::where('pembelajaran_id', $id)->get(),
      'nilaiPas' => NilaiPas::where('pembelajaran_id', $id)->get(),
      'nilaiAkhir' => NilaiAkhir::where('pembelajaran_id', $id)->get(),
      'role' => auth()->user()->role,
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($role, $id)
  {
    return view('pages.datapembelajaran.edit', [
      'pembelajaran' => Pembelajaran::find($id),
      'guru' => Guru::get(),
      'role' => auth()->user()->role,
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $role, $id)
  {
    $request->validate([
      'guru_id' => 'required',
      'kkm' => 'required',
    ]);


    $pembelajaran = Pembelajaran::find($id);
    $pembelajaran->update($request->all());

    return redirect(route('datapembelajaran.index', $role))->withInfo('Data Pembelajaran: <b>' . $pembelajaran->mapel->singkatan . ' ' . $pembelajaran->kelas->name . '</b> berhasil diperbarui!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Request $request, $role, $id)
  {
    Pembelajaran::find($id)->delete();
    return redirect(route('datapembelajaran.index', $role))->withInfo('Data Pembelajaran: <b>' . $request->name . '</b> berhasil dihapus!');
  }

  public function insertNilai(Request $request, $id)
  {
    $pembelajaran = Pembelajaran::find($id);
    $siswas = $request->siswa_id;
    $siswas = Siswa::whereIn('id', $siswas)->get()->pluck('id');

    foreach ($siswas as $i => $siswa) {

      $nilaiPeng = NilaiPengetahuan::whereIn('siswa_id', $siswas)->where('pembelajaran_id', $pembelajaran->id)->get();
      $nilaiPeng = $nilaiPeng->where('siswa_id', $siswa)->first();
      if ($nilaiPeng) {
        $nilaiPeng->update([
          'nilai' => $request->nilai_pengetahuans[$i]
        ]);
      } else {
        if ($request->nilai_pengetahuans[$i]) {
          NilaiPengetahuan::create([
            'siswa_id' => $siswa,
            'pembelajaran_id' => $pembelajaran->id,
            'nilai' => $request->nilai_pengetahuans[$i]
          ]);
        }
      }

      $nilaiKet = NilaiKeterampilan::whereIn('siswa_id', $siswas)->where('pembelajaran_id', $pembelajaran->id)->get();
      $nilaiKet = $nilaiKet->where('siswa_id', $siswa)->first();
      if ($nilaiKet) {
        $nilaiKet->update([
          'nilai' => $request->nilai_keterampilans[$i]
        ]);
      } else {
        if ($request->nilai_keterampilans[$i]) {
          NilaiKeterampilan::create([
            'siswa_id' => $siswa,
            'pembelajaran_id' => $pembelajaran->id,
            'nilai' => $request->nilai_keterampilans[$i]
          ]);
        }
      }

      $nilaiPts = NilaiPts::whereIn('siswa_id', $siswas)->where('pembelajaran_id', $pembelajaran->id)->get();
      $nilaiPts = $nilaiPts->where('siswa_id', $siswa)->first();
      if ($nilaiPts) {
        $nilaiPts->update([
          'nilai' => $request->nilai_pts[$i]
        ]);
      } else {
        if ($request->nilai_pts[$i]) {
          NilaiPts::create([
            'siswa_id' => $siswa,
            'pembelajaran_id' => $pembelajaran->id,
            'nilai' => $request->nilai_pts[$i]
          ]);
        }
      }

      $nilaiPas = NilaiPas::whereIn('siswa_id', $siswas)->where('pembelajaran_id', $pembelajaran->id)->get();
      $nilaiPas = $nilaiPas->where('siswa_id', $siswa)->first();
      if ($nilaiPas) {
        $nilaiPas->update([
          'nilai' => $request->nilai_pas[$i]
        ]);
      } else {
        if ($request->nilai_pas[$i]) {
          NilaiPas::create([
            'siswa_id' => $siswa,
            'pembelajaran_id' => $pembelajaran->id,
            'nilai' => $request->nilai_pas[$i]
          ]);
        }
      }

      $nilaiAkhir = NilaiAkhir::whereIn('siswa_id', $siswas)->where('pembelajaran_id', $pembelajaran->id)->get();
      $nilaiAkhir = $nilaiAkhir->where('siswa_id', $siswa)->first();

      $nk = $request->nilai_pengetahuans[$i];
      $np = $request->nilai_keterampilans[$i];
      $nt = $request->nilai_pts[$i];
      $na = $request->nilai_pas[$i];
      $rataRata = ($nk + $np + $nt + $na) / 4;

      if ($nilaiAkhir) {
        $nilaiAkhir->update([
          'rata_rata' => floor($rataRata),
          'deskripsi' => $request->deskripsi[$i]
        ]);
      } else {
        // if ($request->nilai_[$i]) {
          NilaiAkhir::create([
            'siswa_id' => $siswa,
            'pembelajaran_id' => $pembelajaran->id,
            'rata_rata' => floor($rataRata),
            'deskripsi' => $request->deskripsi[$i],
          ]);
        // }
      }

    }

    return back()->withInfo('Data berhasil diperbarui!');
  }
}
