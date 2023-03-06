<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class userControllers extends Controller
{
   public function tampil()
  {
    $staff = User::get();
   return  $data = DataTables::of($staff)->addIndexColumn()->addColumn('aksi', function($row){
      $btn = '<a href="/admin/kelolaAdmin/reset/'.$row->id.'" class="btn btn-warning btn-sm">Reset</a>&nbsp;&nbsp;<a data-id="'.$row->id.'" class="hapus btn btn-danger btn-sm">Hapus</a>&nbsp;&nbsp;';
    return $btn;

})



->rawColumns(['aksi'])

->make(true);
  }
  public function hapus($id)
  {
    $user = User::where('id',$id);
    $user->delete();
    return redirect()->back()->with(['success'=>'data berhasil dihapus']);
  }
  public function reset($id)
  {
    $user = User::where('id',$id);
    $user->update(['password'=>Hash::make("12345678")]);  
    return redirect()->back()->with(['success'=>'data berhasil direset']);
  }
  public function tambah(Request $user)
  {
    $user1=User::where('email',$user->email)->exists();
    if($user1){
    $user1=User::where('email',$user->email);
    $user1->update(['role'=>$user]);
      return redirect('/admin/admin')->with(['success'=>'data berhasil ditambah']);     
    }
    else{
      return redirect('/admin/admin')->with(['success'=>'data user tidak ada']); 
    }

 
  }
}
