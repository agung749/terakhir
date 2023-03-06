<?php

namespace App\Http\Controllers;

use App\Imports\staffImport;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class StaffController extends Controller
{
  public function import(Request $req)
  {
    Excel::import(new staffImport,$req->file('fileImport'));
  }
public function detail($detail)
{
  $data=Staff::where('id',$detail)->get();
  return $data;
}
  public function tampil()
  {
    $staff = Staff::get();
   return  $data = DataTables::of($staff)->addIndexColumn()->addColumn('aksi', function($row){
      $btn = '<a data-id="'.$row->id.'" class="ubah btn btn-primary btn-sm">Edit</a>&nbsp;&nbsp;<a data-id="'.$row->id.'" class="hapus btn btn-danger btn-sm">Hapus</a>&nbsp;&nbsp;<a href="/berita/'.str_replace(' ','-',$row->judul).'"class=" btn btn-success btn-sm">lihat</a>';
    return $btn;

})
->rawColumns(['aksi'])

->make(true);
  }
  public function tambah(Request $req){
    $req->validate([
      "nama"=>"required",
      "nuptk"=>"required|numeric",
      "tanggal_lahir"=>"required|date",
      "alamat"=>"required",
      "pedidikan_terakhir"=>"required"
      ,"jabatan"=>"required",
      "jk"=>"required",
      "foto"=>"required|mimes:jpg,png",
      "jenis"=>"required",
      "tempat_lahir"=>"required",
      "email"=>"required|email",
      "no_hp"=>'required|numeric|digits_between:12,13'
    ]);
    if($req->file('foto')){
      $file= $req->file('foto');
      $foto= date('YmdHi').$file->getClientOriginalName();
      $file-> move('images/data_guru', $foto);
      
  }
  $staff=new Staff;
  $user=new User;
$user->create(['email'=>$req->email,'password'=>Hash::make('12345678'),'name'=>$req->nama,'role'=>4 ]);
    $staff->create([
      "nama"=>$req->nama,"nuptk"=>$req->nuptk,
      "tanggal_lahir"=>$req->tanggal_lahir,
      "alamat"=>$req->alamat,
      "pedidikan_terakhir"=>$req->pedidikan_terakhir,
      "jabatan"=>$req->jabatan,
      "jk"=>$req->jk,
      "foto"=>$foto,
      "jenis"=>$req->jenis,
      "tempat_lahir"=>$req->tempat_lahir,
      "email"=>$req->email,
      "no_hp"=>$req->no_hp

    ]);
    return redirect()->back()->with(['success'=>'data berhasil ditambah']);
   }
   public function hapus(Request $req,$hapus){
    $staff = Staff::where('id',$hapus);
    $staff->delete();
    return redirect()->back()->with(['success'=>'data berhasil dihapus']);
  
    }
    public function ubah(Request $req,$ubah){
      $req->validate([
        "nama"=>"required",
        "nuptk"=>"required|numeric",
        "tanggal_lahir"=>"required|date",
        "alamat"=>"required",
        "pedidikan_terakhir"=>"required"
        ,"jabatan"=>"required",
        "jk"=>"required",
        "foto"=>"nullable|mimes:jpg,png",
        "jenis"=>"required",
        "tempat_lahir"=>"required",
        "email"=>"required|email",
        "no_hp"=>'required|numeric|digits_between:12,13'
      ]);
      $staff= Staff::where('id',$ubah);
      $data=$staff->get('foto');
      $foto = $data[0]->foto;
      if($req->file('foto')){
        $file= $req->file('foto');
        $foto= date('YmdHi').$file->getClientOriginalName();
        $file-> move('images/data_guru', $foto);
        
    }
   
    
      $staff->update([
        "nama"=>$req->nama,"nuptk"=>$req->nuptk,
        "tanggal_lahir"=>$req->tanggal_lahir,
        "alamat"=>$req->alamat,
        "pedidikan_terakhir"=>$req->pedidikan_terakhir,
        "jabatan"=>$req->jabatan,
        "jk"=>$req->jk,
        "foto"=>$foto,
        "jenis"=>$req->jenis,
        "tempat_lahir"=>$req->tempat_lahir,
        "email"=>$req->email,
        "no_hp"=>$req->no_hp,
        'tgl_masuk'=>$req->tgl_masuk
  
      ]);
      return redirect()->back()->with(['success'=>'data berhasil diubah']);
    }
    public function print($print){
    
    }
    public function rekap(){
    
    }

    public function forget($print){
    
    }
}
