<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWaliSiswaRequest;
use App\Http\Requests\UpdateWaliSiswaRequest;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Wali;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DataWaliSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(auth()->user()->role !== 'admin'){
          abort('403');
      } else{
          return view('pages.datawalisiswa.index', [
            'walisiswa' => Wali::get(),
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
        return view('pages.datawalisiswa.create', [
          'siswa' => Siswa::orderBy('name', 'ASC')->get(),
          'role' => Auth::user()->role,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWaliSiswaRequest $request, $role)
    {
        $inputUser = User::create([
          'username' => $request->username,
          'password' => bcrypt($request->password),
          'role' => $request->role,
        ]);
        $inputUser; // Create User

        $request['user_id'] = $inputUser->id;
        $inputWali = $request->except(['_token', '_method', 'username', 'password']);
        Wali::create($inputWali);

        return redirect(route('datawalisiswa.index', $role))->withInfo('Data Wali Siswa berhasil ditambahkan!');
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
        return view('pages.datawalisiswa.edit',[
          'walisiswa' => Wali::find($id),
          'siswa' => Siswa::get(),
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
    public function update(UpdateWaliSiswaRequest $request, $role, $id)
    {
      Wali::find($id)->update($request->all());
      return redirect(route('datawalisiswa.index', ['datawalisiswa' => $id, 'role' => $role]))->withInfo('Data Wali Siswa: <b>' . $request->name . '</b> berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $role, $id)
    {
      Wali::find($id)->delete();
      User::where('id', $request->user_id)->delete();
      return redirect(route('datawalisiswa.index', ['datawalisiswa' => $id, 'role' => $role]))->withInfo('Data Wali: <b>' . Str::before($request->name, ' ') . '</b> berhasil dihapus!');
    }
}
