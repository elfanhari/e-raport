<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateAkunRequest;
use App\Models\User;
use Illuminate\Http\Request;

class DataAkunController extends Controller
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
        return view('pages.dataakun.index', [
          'akun' => User::get(),
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $akun = User::find($id);
        return view('pages.dataakun.edit', compact('akun'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $akun = User::find($id);
        $request->validate([
          'username' => 'required|unique:users,username,' . $akun->id,
        ]);

        if($request->filled('password')){
          $request['password'] = bcrypt($request->password);
          $akun->update($request->all());
        } else {
          $akun->update($request->except('password'));
        }

        return redirect(route('dataakun.index'))->withInfo('Data Akun berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
