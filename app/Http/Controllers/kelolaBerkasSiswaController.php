<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class kelolaBerkasSiswaController extends Controller
{
  public function ubah($id,Request $req)
  {
    
    $req->validate([
      'foto_skhu'=>'nullable|mimes:jpg,png|max:2000',
      'foto_ijazah'=>'nullable|mimes:jpg,png|max:2000',
      'foto'=>'nullable|mimes:jpg,png|max:2000'
    ]);
    $user = Siswa::where('id',$id);
    $data = $user->get();
    if($req->foto_skhu!=null){
      if($data[0]->foto_skhu!=null){
        unlink('/images/data_siswa/'.$data[0]->foto_skhu);
      }
      $file = $req->file('foto_skhu');
      $nama = date('yMDH').'SKHU'.str_replace(' ','-' ,$file->getClientOriginalName());
      $file->move('/images/data_siswa',$nama);
      $user->update(['foto_skhu'=>$nama]);
    }
    if($req->foto_ijazah!=null){
      if($data[0]->foto_ijazah!=null){
        unlink('images/data_siswa/'.$data[0]->foto_ijazah);
      }
      $file = $req->file('foto_ijazah');
      $nama = date('yMDH').'ijazah'.str_replace(' ','-' ,$file->getClientOriginalName());
      $file->move('images/data_siswa',$nama);
      $user->update(['foto_skhu'=>$nama]);
    }
    if($req->foto_diri!=null){
    
      $file = $req->file('foto_diri');
      $nama = date('yMDH').str_replace(' ','-' ,$file->getClientOriginalName());
      $file->move('images/data_siswa',$nama);
      $user->update(['foto'=>$nama]);
    }
    return redirect('/admin/kelolaBerkasSiswa')->with(['success'=>'data berhasil diubah']);
  }
  public function detail($data)
  {
    $oso = Siswa::where('id',$data)->get();
    return $oso;
  }
    public function tampil()
    {
        $data =  Siswa::where('status',1)->orWhere('status',2)->with('classes')->get();
        
        return DataTables::of($data)
        ->addIndexColumn()
         ->addColumn('aksi', function($row){
              $btn = '<a data-id="'.$row->id.'" class="ubah btn btn-primary btn-sm">Edit</a>';
              if($row->foto!=null){
                $btn .= '<a href="/images/data_siswa/'.$row->foto.'" class=" btn btn-danger btn-sm">Foto Diri</a>';
              }
              if($row->foto_ijazah!=null){
                $btn .= '<a href="/images/data_siswa/'.$row->foto_ijazah.'" class=" btn btn-danger btn-sm">Ijazah</a>';
              }
              if($row->foto_skhu!=null){
                $btn .= '<a href="/images/data_siswa/'.$row->foto_skhu.'" class=" btn btn-danger btn-sm">SKHU</a>';
              }

               return $btn;

          })->addColumn('ket', function($row){
            $text="Belum Semua";
           if($row->foto!=null){
            $text="";
            $text.="Foto Sudah<br>";
           }
           if($row->foto_ijazah!=null){
            $text.="Ijazah Susda<br>";        
           }
           if($row->foto_!=null){
            $text.="Ijazah Susda<br>";        
           }
            return $text;

        })->addColumn('kelas',function($row){
          return $row->classes->nama;
        })->rawColumns(['aksi','ket','kelas'])

          ->make(true);
    }
}
