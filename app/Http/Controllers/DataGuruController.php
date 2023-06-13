<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\StoreGuruRequest;
use App\Http\Requests\UpdateGuruRequest;
use App\Models\Admin;
use App\Models\Ekstrakurikuler;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Pembelajaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DataGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role !== 'admin') {
          abort('403');
        } else{
          return view('pages.dataguru.index', [
            'guru' => Guru::orderBy('name', 'ASC')->get(),
            'kelas' => Kelas::get(),
            'pembelajaran' => Pembelajaran::get(),
            'ekstrakurikuler' => Ekstrakurikuler::get(),
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
        return view('pages.dataguru.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGuruRequest $request)
    {
        $inputUser = User::create([
          'username' => $request->username,
          'password' => bcrypt($request->password),
          'role' => 'guru',
        ]);
        $inputUser; // Create User
        $request['user_id'] = $inputUser->id;
        $inputGuru = $request->except(['_token', '_method', 'username', 'password']);
        Guru::create($inputGuru);
        return redirect(route('dataguru.index'))->withInfo('Data Guru: <b
        >' . $request->name . '</b> berhasil ditambahkan!');
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
    public function edit($id)
    {
        $guru = Guru::find($id);
        return view('pages.dataguru.edit', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGuruRequest $request, $id)
    {
      Guru::find($id)->update($request->all());
      return redirect(route('dataguru.index'))->withInfo('Data Guru: <b>' . $request->name . '</b> berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
      Guru::find($id)->delete();
      User::where('id', $request->user_id)->delete();
      return redirect(route('dataguru.index'))->withInfo('Data Guru: <b>' . $request->name . '</b> berhasil dihapus!');
    }
}
