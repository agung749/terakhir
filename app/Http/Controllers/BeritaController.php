<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class BeritaController extends Controller
{
    public function tampil()
    {
      
 

            $data = Berita::latest()->get();

            return DataTables::of($data)
                  ->addIndexColumn()
                   ->addColumn('aksi', function($row){
                           $btn = '<a data-id="'.$row->id.'" class="ubah btn btn-primary btn-sm">Edit</a>&nbsp;&nbsp;<a data-id="'.$row->id.'" class="hapus btn btn-danger btn-sm">Hapus</a>&nbsp;&nbsp;<a href="/berita/'.str_replace(' ','-',$row->judul).'"class=" btn btn-success btn-sm">lihat</a>';
                         return $btn;

                    })
                    ->rawColumns(['aksi'])

                    ->make(true);

    
    }
    public function detail($detail)
    {
        $data = Berita::where('id',$detail)->get();
       
        return $data;
    }    public function tambah(Request $req){
        $req->validate([
            'judul'=>'unique:berita|required',
            'isi'=>'required',
            'foto'=>'required|mimes:jpg,png',
            'video'=>'nullable|mimes:mp4,mkv'
        ]);
        $berita = new Berita();
        $foto="";
        $video="";

        if($req->file('foto')){
            $file= $req->file('foto');
            $foto= date('YmdHi').$file->getClientOriginalName();
            $file->move(('images/berita'),  $foto);
           
        }
        else if($req->file('video')){
            $file= $req->file('video');
            $video= date('YmdHi').$file->getClientOriginalName();
            $file-> move('videos/berita',  $video);
           
        }
        $user= Auth::user()->id;
        $berita->create([
            'isi'=>$req->isi,
            'judul'=>$req->judul,
            'foto'=>$foto,
            "kategori"=>$req->kategori,
            'user_id'=>$user,
            'video'=>$video,
            'tidak_suka'=>0,
            'suka'=>0
        ]);
        return redirect()->back()->with(['success'=>'data berhasil dimasukan']);
    }
 
     public function ubah(Request $req,$ubah){
        $berita = Berita::where('id',$ubah);
        $data = Berita::where('id',$ubah)->get();
        $req->validate([
            'judul'=>'required',
            'isi'=>'required',
            'foto'=>'nullable|mimes:jpg,png',
            'video'=>'nullable|mimes:mp4,mkv'
        ]);
        $foto=$data[0]->foto;
        $video=$data[0]->video;
        if($req->file('foto')){
            $file= $req->file('foto');
            $foto= date('YmdHi').str_replace(' ','-',$file->getClientOriginalName());
            $file->move(('images/berita'),  $foto);
           
        }
        else if($req->file('video')){
            $file= $req->file('video');
            $video= date('YmdHi').str_replace(' ','-',$file->getClientOriginalName());
            $file->move('videos/berita',  $video);
           
        }
            $berita->update([
                'isi'=>$req->isi,
                'judul'=>$req->judul,
                'suka'=>0,
                'video'=>$video,
                'foto'=>$foto,
                'user_id'=>Auth::user()->id,
                "kategori"=>$req->kategori,
                'tidak_suka'=>0
            ]);
            return redirect('/admin/kelolaBerita')->with(['success'=>'data berhasil diupdate']);
     }
  public function hapus($req)
  {
    $data = Berita::where('id',$req)->with('komentar');
    
    if(isset($data->komentar)){
        $data->komentar->delete();
    }
    $data->delete();
    return redirect('/admin/kelolaBerita')->with(['success'=>'data berhasil dihapus']);
  }

     
}
