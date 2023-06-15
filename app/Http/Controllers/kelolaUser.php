<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class kelolaUser extends Controller
{
  public function show()
  {
    return view('ubah-password');
  }
  public function ubahPSWD(Request $req)
  {
  
    $user = User::where('id', Auth::user()->id);
    if (Auth::attempt(['email' => Auth::user()->email, 'password' => $req->password_lama])) {
      $req->validate([
        'password' => "min:8|confirmed"
      ]);
   
      $user->update(['password' => Hash::make($req->password_baru)]);
      return redirect('/user/ubah')->with('success',"KATA SANDI BERHASIL DIUBAH ");
    }
    else{
      return redirect('/user/ubah')->withErrors(['error' => "KATA SANDI SALAH "]);
    }
  }
  public function tambah(Request $req)
  {
  }
  public function hapus(Request $req, $hapus)
  {
  }
  public function ubah(Request $req, $ubah)
  {
  }
  public function print($print)
  {
  }
  public function rekap()
  {
  }
  public function reset($print)
  {
  }
}
