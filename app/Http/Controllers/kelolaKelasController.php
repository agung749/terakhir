<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\jurusan;
use App\Models\test;
use App\Models\Kelas;
use Yajra\DataTables\Facades\DataTables;
use App\Models\tahun_ajaran;
class kelolaKelasController extends Controller
{
public function tambah(Request $req) {
$jurusans = array_keys($req->all());
foreach($jurusans as $jurusan){
    if($jurusan!="_token"&&$jurusan!="angkatan"){
    if($req->$jurusan!=0){
        for($i=1; $i <= $req->$jurusan;$i++){
            $check = jurusan::where('jurusan',$jurusan)->get();

            if(isset($check[0])){
            kelas::where('jurusan',$check[0]->id)->where('posisi',0)->where('angkatan',$req->angkatan)->update(['posisi'=>1]);}
            $angkatan = tahun_ajaran::where('tahun_ajaran',$req->tahun_ajaran)->get('status');
            if($angkatan[0]->status==1){
            $kls='X';
            }
            else if($angkatan[0]->status==2){
                $kls='XI';
            }
             else if($angkatan[0]->status==3){
                $kls='XII';
            }

            kelas::create(['kelas'=>$kls,'jumlah'=>0,'status'=>1,'jurusan'=>$check[0]->id,'posisi'=>$i+1,'angkatan'=>$req->tahun_ajaran]);
        }
    }
}
}
return redirect('/admin/kelolaKelas')->with(['success'=>'data berhasil ditambah']);
}

public function hapus($id) {
    $kelas=kelas::where('id',$id);
    $siswa=siswa::where('kelas',$id)->update(['kelas'=>""]);
    $kelas->delete();
    return redirect('/admin/kelolaKelas')->with(['success'=>'data berhasil dihapus']);
}
public function tampil(){

    $data = kelas::with('jurusans')->get();
    return DataTables::of($data)
    ->addIndexColumn()
    ->addColumn('kelas',function($row){

        if($row->posisi==0){
            $row->posisi=" ";
        }
        return $row->kelas.' '.$row->jurusans->jurusan.' '.$row->posisi.' ';
        })
    ->addColumn('aksi',function($row){
        return "<a href='/admin/kelolaKelas/hapus/".$row->id."' class='btn btn-danger btn-md'>Hapus</a>";
     })->rawColumns(['nilai','jurusan','kelas','aksi'])
    ->make(true);
}
}
