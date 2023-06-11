<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Admin;
use App\Models\Informasi;
use App\Models\User;
use Illuminate\Http\Request;

class DataAdminController extends Controller
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
        return view('pages.dataadmin.index', [
          'admin' => Admin::get(),
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
      return view('pages.dataadmin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminRequest $request)
    {
        $inputUser = User::create([
          'username' => $request->username,
          'password' => bcrypt($request->password),
          'role' => 'admin',
        ]);
        $inputUser; // Create User
        $request['user_id'] = $inputUser->id;
        $inputAdmin = $request->except(['_token', '_method', 'username', 'password']);
        Admin::create($inputAdmin);
        return redirect(route('dataadmin.index'))->withInfo('Data Admin: <b?>' . $request->name . '</b> berhasil ditambahkan!');
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
        $admin = Admin::find($id);
        return view('pages.dataadmin.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminRequest $request, $id)
    {
      Admin::find($id)->update($request->all());
      return redirect(route('dataadmin.index'))->withInfo('Data Admin: <b>' . $request->name . '</b> berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
      Admin::find($id)->delete();
      User::where('id', $request->user_id)->delete();
      Informasi::where('user_id', $request->user_id)->delete();
      return redirect(route('dataadmin.index'))->withInfo('Data Admin: <b>' . $request->name . '</b> berhasil dihapus!');
    }
}
