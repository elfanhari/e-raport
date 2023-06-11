<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
      return view('login');
    }

    public function cekLogin(Request $request)
    {

      $input = $request->validate([
        'username' => ['required'],
        'password' => ['required'],
      ]);

      if (Auth::attempt($input)) {
        $role = auth()->user()->role;
        return redirect( $role . '/dashboard')->with('login', $role);
      } else {
        return back()->withInfo('Username atau password salah!');
      }
    }
}
