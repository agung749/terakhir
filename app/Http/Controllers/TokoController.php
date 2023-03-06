<?php

namespace App\Http\Controllers;

use App\Models\link_toko;
use Illuminate\Http\Request;
use App\Models\Toko;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class TokoController extends Controller
{
    public function show()
    {
        return view('spw.toko');
    }
    public function hapus($data)
    {
        $hapus = toko::where('id',$data);
        $hapus->delete();
        $toko = link_toko::where('toko_id',$data)->delete();
        return redirect()->back()->with(['success'=>'data berhasil dihapus']);
       
    }
    public function ubah(Request $req,$ubah){
        $toko = Toko::where('id',$ubah);
        $data = Toko::where('id',$ubah)->get();
        $req->validate([
            'nama'=>'required',
            'isi'=>'required',
            'foto'=>'required|mimes:jpg,png',
            'lokasi'=>'required',
        ]);
   
        $foto=$data[0]->foto;
        if($req->file('foto')){
            $file= $req->file('foto');
            $foto= date('YmdHi').$file->getClientOriginalName();
            $file->move(('images/toko'),  $foto);   
        }
          
        $user= Auth::user()->id;
        $toko->update([
            'isi'=>$req->isi,
            'nama'=>$req->nama,
            'foto'=>$foto,
            "lokasi"=>$req->lokasi,
            'owner_id'=>$user,
        
        ]);
       
        return redirect()->back()->with(['success'=>'data berhasil dimasukan']);
   
    }
    public function detail($detail)
    {
        $data = Toko::where('id',$detail)->get(); 
        
        return $data;
    }
    public function tambah(Request $req){
        $req->validate([
            'nama'=>'unique:toko|required',
            'isi'=>'required',
            'foto'=>'required|mimes:jpg,png',
            'lokasi'=>'required',
        ]);
        $toko = new Toko();
        $foto="";
        $video="";

        if($req->file('foto')){
            $file= $req->file('foto');
            $foto= date('YmdHi').$file->getClientOriginalName();
            $file->move(('images/toko'),  $foto);
           
        }
     
        $user= Auth::user()->id;
        $toko->create([
            'isi'=>$req->isi,
            'nama'=>$req->nama,
            'foto'=>$foto,
            "lokasi"=>$req->lokasi,
            'owner_id'=>$user,
        ]);
        $toko_id = Toko::where('nama',$req->nama)->get();
  
  
        return redirect()->back()->with(['success'=>'data berhasil dimasukan']);
    }
    public function tampil()
    {
      
 
$user = Auth::user();
            $data = Toko::where('owner_id',$user->id)->get();

            return DataTables::of($data)
                  ->addIndexColumn()
                   ->addColumn('aksi', function($row){
                           $btn = '<a data-id="'.$row->id.'" class="ubah btn btn-primary btn-sm">Edit</a>&nbsp;&nbsp;<a data-id="'.$row->id.'" class="hapus btn btn-danger btn-sm">Hapus</a>&nbsp;&nbsp;';
                         return $btn;

                    })
                    ->rawColumns(['aksi'])

                    ->make(true);

    
    }
}
