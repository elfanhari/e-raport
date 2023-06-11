<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfilRequest;
use App\Models\Admin;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Wali;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class ProfilController extends Controller
{
  public function index()
  {
    return view('pages.profil.index');
  }

  public function update(UpdateProfilRequest $request, $id)
  {
    // dd('aduh');
    $data = request()->except(['_token', '_method']);

    if (auth()->user()->role == 'admin') {
      Admin::where('user_id', $id)->update($data);
    }
    if (auth()->user()->role == 'guru') {
      Guru::where('user_id', $id)->update($data);
    }
    if (auth()->user()->role == 'walisiswa') {
      Wali::where('user_id', $id)->update($data);
    }
    if (auth()->user()->role == 'siswa') {
      Siswa::where('user_id', $id)->update($data);
    }

    return back()->withInfo('Profil anda berhasil diperbarui!');
  }

  public function updatePhoto(Request $request)
  {

    $request->validate([
      'files' => ['image', 'required'],
    ]);

    $files = $request->file('files');
    if ($request->hasFile('files')) {
      $filenameWithExtension      = $request->file('files')->getClientOriginalExtension();
      $filename                   = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
      $extension                  = $files->getClientOriginalExtension();
      $filenamesimpan             = 'img' . time() . '.' . $extension;
      $files->move('img', $filenamesimpan);

      $editdata = [
        'foto' => $filenamesimpan,
      ];

      if(auth()->user()->role == 'admin'){
        Admin::where('user_id', auth()->user()->id)->update($editdata);
      } elseif(auth()->user()->role == 'guru'){
        Guru::where('user_id', auth()->user()->id)->update($editdata);
      } elseif(auth()->user()->role == 'siswa'){
        Siswa::where('user_id', auth()->user()->id)->update($editdata);
      } elseif(auth()->user()->role == 'walisiswa'){
        Wali::where('user_id', auth()->user()->id)->update($editdata);
      } else{
        return back()->with('info', 'Foto profil gagal diperbarui!');
      }
    }

    if ($request->old_foto != 'default.jpg'){
      $filegambar = public_path('/img/' . $request->old_foto);
      File::delete($filegambar);
    }
    return back()->with([
      'info' => 'Foto profil berhasil diperbarui!',
      'foto' => 'active',
    ]);
  }

  public function updateAkun(Request $request, $id)
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

      return back()->withInfo('Data Akun berhasil diperbarui!');
  }

}
