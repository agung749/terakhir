<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class GalleryController extends Controller
{
    public function tampil()
    {
        
        $data = Gallery::latest()->get();

        return DataTables::of($data)
              ->addIndexColumn()
               ->addColumn('aksi', function($row){
                       $btn = '<a data-id="'.$row->id.'" class="ubah btn btn-primary btn-sm">Edit</a>&nbsp;&nbsp;<a data-id="'.$row->id.'" class="hapus btn btn-danger btn-sm">Hapus</a>';
                     return $btn;

                })
                ->rawColumns(['aksi'])

                ->make(true);

    }
    public function tambah(Request $req){
        $data = new Gallery();
        $req->validate([
            'nama'=>'required',
            'foto'=>'mimes:png,jpg|required',
            'deskripsi'=>'required',
            'kategory'=>'required'
        ]);
        if($req->file('foto')){
            $file= $req->file('foto');
            $foto= date('YmdHi').$file->getClientOriginalName();
            $file->move(('images/gallery'),  $foto);
           
        }
        $data->create([
           'nama'=>$req->nama,
           'foto'=>$foto,
           'deskripsi'=>$req->deskripsi,
           'kategori'=>$req->kategory
        ]);
        return redirect()->back()->with(['success'=>'data berhasil ditambah']);
    }
    public function hapus($hapus){
        $data = Gallery::where('id',$hapus);
        $data->delete();
        return redirect()->back()->with(['success'=>'data berhasil dihapus']);
     }
     public function ubah(Request $req,$ubah){
        $data = Gallery::where('id',$ubah);
        $gambar = Gallery::where('id',$ubah)->get();
        $foto = $gambar[0]->foto;
        $req->validate([
            'nama'=>'required',
            'deskripsi'=>'required',
            'kategory'=>'required'
        ]);
        if($req->file('foto')){
            $file= $req->file('foto');
            $foto= date('YmdHi').$file->getClientOriginalName();
            $file->move(('images/gallery'),  $foto);
           
        }
        $data->update([
           'nama'=>$req->nama,
           'foto'=>$foto,
           'deskripsi'=>$req->deskripsi,
           'kategori'=>$req->kategory
        ]);
        return redirect()->back()->with(['success'=>'data berhasil diubah']);
     }
  
}
