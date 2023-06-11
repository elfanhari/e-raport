<?php

namespace App\Http\Controllers;

use App\Http\Requests\SekolahRequest;
use App\Models\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class DataSekolahController extends Controller
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
        $sekolah = Sekolah::first();
        return view('pages.datasekolah.index', compact('sekolah'));
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
    public function store(SekolahRequest $request)
    {
        Sekolah::create($request->all());
        return redirect(route('datasekolah.index'))->withInfo('Data Sekolah berhasil dibuat!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SekolahRequest $request, $id)
    {
      Sekolah::find($id)->update($request->all());
      return redirect(route('datasekolah.index'))->withInfo('Data Sekolah berhasil diperbarui!');
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

    public function updateLogo(Request $request, $id)
    {
      $request->validate([
        'files' => ['image', 'required'],
      ]);

      $files = $request->file('files');
      if ($request->hasFile('files')) {
        $filenameWithExtension      = $request->file('files')->getClientOriginalExtension();
        $filename                   = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
        $extension                  = $files->getClientOriginalExtension();
        $filenamesimpan             = 'logo' . time() . '.' . $extension;
        $files->move('img', $filenamesimpan);

        $editdata = [
          'logo' => $filenamesimpan,
        ];

        Sekolah::find($id)->update($editdata);
      }

      if ($request->old_logo != 'logo.png'){
        $filegambar = public_path('/img/' . $request->old_logo);
        File::delete($filegambar);
      }

      return back()->withInfo('Foto profil berhasil diperbarui!');
    }
}
