<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
  
 
 
   public function ubah(Request $req)
   {
    $ubah = Sekolah::where('id',0);
    
  
    $ubah->update([
        'video'=>$req->video,
        'deskripsi'=>$req->deskripsi,
        'no_hp'=>$req->no_hp,
        'fb'=>$req->fb,
        'instagram'=>$req->instagram
        
    ]);
    return redirect()->back()->with([
        'success'=>'data berhasil diubah'
    ]);
   }
}
