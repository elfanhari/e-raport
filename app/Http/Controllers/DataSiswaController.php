<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSiswaRequest;
use App\Http\Requests\UpdateSiswaRequest;
use App\Models\AnggotaEkskul;
use App\Models\Catatanwalikelas;
use App\Models\Kehadiran;
use App\Models\Kelas;
use App\Models\NilaiAkhir;
use App\Models\NilaiKeterampilan;
use App\Models\NilaiPas;
use App\Models\NilaiPengetahuan;
use App\Models\NilaiPts;
use App\Models\NilaiSosial;
use App\Models\NilaiSpiritual;
use App\Models\Prestasi;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Wali;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redis;

class DataSiswaController extends Controller
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
          return view('pages.datasiswa.index', [
            'siswa' => Siswa::orderBy('name', 'ASC')->get(),
            'role' => Auth::user()->role,
          ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.datasiswa.create', [
          'kelas' => Kelas::orderBy('tingkat', 'ASC')->orderBy('name', 'ASC')->get(),
          'role' => Auth::user()->role,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSiswaRequest $request)
    {
      $inputUser = User::create([
        'username' => $request->username,
        'password' => bcrypt($request->password),
        'role' => 'siswa',
      ]);
      $inputUser;

      $request['user_id'] = $inputUser->id;
      $inputSiswa = $request->except(['_token', '_method', 'username', 'password']);
      Siswa::create($inputSiswa);

      $role = Auth::user()->role;

      return redirect(route('datasiswa.index', $role))->withInfo('Data siswa berhasil ditambahkan!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($role, $id)
    {
        return view('pages.datasiswa.edit', [
          'siswa' => Siswa::find($id),
          'kelas' => Kelas::get(),
          'role' => Auth::user()->role,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSiswaRequest $request, $role, $id)
    {
        Siswa::find($id)->update($request->all());
        return redirect(route('datasiswa.index',['datakelas' => $id, 'role' => $role]))->withInfo('Data Siswa: <b>' . Str::before($request->name, ' ') . '</b> berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $role, $id)
    {
      $siswa = Siswa::find($id);
      $walisiswa = User::where('id', $siswa->wali->first()->user_id  ?? '')->delete();
      $siswa->delete();
      $walisiswa;
      Wali::where('siswa_id', $id)->delete();
      User::where('id', $request->user_id)->delete();
      AnggotaEkskul::where('siswa_id', $id)->delete();
      Catatanwalikelas::where('siswa_id', $id)->delete();
      Kehadiran::where('siswa_id', $id)->delete();
      NilaiPas::where('siswa_id', $id)->delete();
      NilaiPts::where('siswa_id', $id)->delete();
      NilaiSosial::where('siswa_id', $id)->delete();
      NilaiSpiritual::where('siswa_id', $id)->delete();
      NilaiPengetahuan::where('siswa_id', $id)->delete();
      NilaiKeterampilan::where('siswa_id', $id)->delete();
      Prestasi::where('siswa_id', $id)->delete();
      NilaiAkhir::where('siswa_id', $id)->delete();
      return redirect(route('datasiswa.index', ['datasiswa' => $id, 'role' => $role]))->withInfo('Data Siswa: <b>' . Str::before($siswa->name, ' ') . '</b> berhasil dihapus!');
    }
}
