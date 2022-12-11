<?php

namespace App\Http\Controllers;

use App\Exports\Pendaftaran;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PendaftaranController extends Controller
{
   public function tambah(Request $req){
    $req->validate([
        "nama"=>'required',
        "tempat_lahir"=>'required',
        "tgl_lahir"=>'required',
        "tinggi"=>'required|numeric',
        "berat"=>'required|numeric',
        "sd"=>"required" ,
        "smp"=>"required" ,
        "no_tel"=>"required|digits_between:11,14", 
        "email"=>'required|email',
        "un_smp"=>'nullable|numeric|digits:14|unique:siswa',
        "nisn"=>'nullable|numeric|digits:10|unique:siswa',
        "nik"=>'required|numeric|digits:16|unique:siswa',
        "foto"=>"nullable|mimes:jpg,png" ,
        "foto_ijazah"=>"nullable|mimes:jpg,png" ,
        "foto_skhu"=>"nullable|mimes:jpg,png", 
        "kps"=>'nullable|numeric',
        "kph"=>'nullable|numeric',
        "kip"=>'nullable|numeric',
        "nama_ayah"=>'required',
        "nama_ibu"=>'required',
        "pekerjaan_ibu"=>"required",
        "pekerjaan_ayah"=>"required",
        "pengasilan_ibu"=>"required",
        "penghasilan_ayah"=>"required",
        "rt"=>"required|numeric",
        "rw"=>"required|numeric",
        'jalan'=>"required",
    ]);
    $foto="";
    $foto_ijazah="";
    $foto_skhu="";
   
        if($req->file('foto_ijazah')){
            $file= $req->file('foto_ijazah');
            $foto_ijazah= date('YmdHi').$file->getClientOriginalName();
            $file-> move('images/data_siswa',  $foto_ijazah);
           
        }
    
        if($req->file('foto')){
            $file= $req->file('foto');
            $foto= date('YmdHi').$file->getClientOriginalName();
            $file-> move('images/data_siswa', $foto);
            
        }
        if($req->file('foto_skhu')){
            $file= $req->file('foto_skhu');
            $foto_skhu=date('YmdHi').$file->getClientOriginalName();
            $file-> move('images/data_siswa',  $foto_skhu);
        }
    Siswa::create([
        "nama"=>$req->nama,
        "kelurahan"=>$req->kelurahan,
        "kecamatan"=>$req->kecamatan,
        "alamat"=>$req->jalan.' '.'RT  '.$req->rt.'RW '.$req->rw.' '.$req->kelurahan.' '.$req->kecamatan.' '.$req->kabupaten,
        "no_hp"=>$req->no_hp,
        "jenis_tempat_tinggal"=>$req->jenis_tempat_tinggal,
        "tgl_lahir"=>$req->tgl_lahir,
        "nisn"=>$req->nisn,
        "nik"=>$req->nik,
        "foto"=>$foto,
        "jk"=>$req->jk,
        "Ijazah"=>$req->Ijazah,
        "skhu"=>$req->skhu,
        "un_smp"=>$req->un_smp,
        "tempat_lahir"=>$req->tempat_lahir,
        "agama"=>$req->agama,
        "sd"=>$req->sd,
        "smp"=>$req->smp,
        "transportasi"=>$req->transportasi,
        "no_tel"=>$req->no_tel,
        "email"=>$req->email,
        "kps"=>$req->kps,
        "kph"=>$req->kph,
        "kip"=>$req->kip,
        "tinggi"=>$req->tinggi,
        "berat"=>$req->berat,
        "foto_ijazah"=>$foto_ijazah,
        "foto_skhu"=>$foto_skhu,
        "status"=>$req->status,
        "jarak"=>$req->jarak,
        "penghasilan_ayah"=>$req->penghasilan_ayah,
        "penghasilan_wali"=>$req->penghasilan_wali,
        "penghasilan_ibu"=>$req->penghasilan_ibu,
        "nama_ayah"=>$req->nama_ayah,
        "nama_ibu"=>$req->nama_ibu,
        "nama_wali"=>$req->nama_wali,
        "keadaan_ayah"=>$req->keadaan_ayah,
        "keadaan_ibu"=>$req->keadaan_ibu,
        "keadaan_wali"=>$req->keadaan_wali,
        "pekerjaan_ibu"=>$req->pekerjaan_ibu,
        "pekerjaan_ayah"=>$req->pekerjaan_ayah,
        "pekerjaan_wali"=>$req->pekerjaan_wali,
        "kabupaten"=>$req->kabupaten,
        "waktu"=>$req->waktu,
        "saudara"=>$req->saudara,
        "kebutuhan_khusus_wali"=>$req->kebutuhan_khusus_wali,
        "kebutuhan_khusus_ibu"=>$req->kebutuhan_khusus_ibu,
        "kebutuhan_khusus_ayah"=>$req->kebutuhan_khusus_ayah,
        "jurusan"=>$req->jurusan,
        "pendidikan_ayah"=>$req->pendidikan_ayah,
        "pendidikan_ibu"=>$req->pendidikan_ibu,
        "pendidikan_wali"=>$req->pendidikan_wali,
        "tanggal_lahir_ibu"=>$req->tanggal_lahir_ibu,
        "tanggal_lahir_ayah"=>$req->tanggal_lahir_ayah,
        "tanggal_lahir_wali"=>$req->tanggal_lahir_wali,
        "rt"=>$req->rt,
        "rw"=>$req->rw,
        "Jalan"=>$req->jalan,
        'status'=>0
    ]);
   }
   public function hapus(Request $req,$hapus){
    
    }
    public function ubah(Request $req,$ubah){
    
    }
    public function print(){
        return Excel::download(new Pendaftaran,'Pendaftaran Siswa Tahun '.date('Y').'.xlsx');
    }
    public function rekap(){
    
    }
    public function detail($print){
    
    }
}
