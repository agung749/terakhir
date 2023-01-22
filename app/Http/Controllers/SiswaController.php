<?php

namespace App\Http\Controllers;

use App\Exports\Pendaftaran;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Siswa;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;
class SiswaController extends Controller
{
   public function tambah(Request $req){
    $foto="";
    $foto_ijazah="";
    $foto_skhu="";
    $req->validate([
        "nama"=>"required",
        "kelurahan"=>"required",
        "kecamatan"=>"required",
        "no_hp"=>"required",
        "tgl_lahir"=>"required",
        "nisn"=>"required|numeric|digits_between:10,11",
        "jenis_tempat_tinggal"=>"required",
        "nik"=>"required|numeric|digits_between:16,17",
        "foto"=>"nullable|mimes:jpg,png|max:3000",
        "jk"=>"required",
        "foto_skhu"=>"nullable|mimes:jpg,png|max:3000",
        "foto_ijazah"=>"nullable|mimes:jpg,png|max:3000",
        "Ijazah"=>"nullable",
     
    ]);
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
    $kelurahan=Kelurahan::where('id',$req->kelurahan)->get();
    $kecamatan= Kecamatan::where('id',$req->kecamatan)->get();
    $kabupaten= Kabupaten::where('id',$req->kabupaten)->get();
    $thn_ajaran = date('Y').'/'.date('Y',strtotime(' +1 year'));
    
    $kode_unik=date('d').siswa::where('status',0)->get()->count().$req->jurusan;
    Siswa::create([
        "nama"=>$req->nama,
        "kelurahan"=>$req->kelurahan,
        "kecamatan"=>$req->kecamatan,
        "alamat"=>$req->jalan.' '.'RT  '.$req->rt.'RW '.$req->rw.' '.$kelurahan[0]->name.' '.$kecamatan[0]->name.$kabupaten[0]->name.' Jawa Barat',
        "no_hp"=>$req->no_hp,
        "jenis_tempat_tinggal"=>$req->Jenis_tempat_tinggal,
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
        'status'=>0,
        'tahun_ajaran'=>$thn_ajaran,
        'kode_pos'=>$req->kode_pos,
        'kode_unik'=>$kode_unik]
    );
   $C = Siswa::where('kode_unik',$kode_unik)->where('nama',$req->nama)->get()->toArray(); 
   $data = Carbon::parse($C['0']['tgl_lahir'])->translatedFormat(' d F y');
   $C['0']['tgl_lahir'] = $data;
   $data = Carbon::parse($C[0]['tanggal_lahir_ayah'])->translatedFormat('d F y');
   $C[0]['tanggal_lahir_ayah']=$data;
   $data = Carbon::parse($C[0]['tanggal_lahir_ibu'])->translatedFormat('d F y');
   $C[0]['tanggal_lahir_ibu']=$data;
   if($C[0]['tanggal_lahir_wali']!=null){
   $data = Carbon::parse($C[0]['tanggal_lahir_wali'])->translatedFormat('d F y');
   $C[0]['tanggal_lahir_wali']=$data;
   
   
    }
      
    $tanggal=carbon::parse(date(now()))->translatedFormat('d F y');
     $pdf = Pdf::loadView('/pdf/pendaftaran',['req'=>$C[0],'tanggal'=>$tanggal]);
    return $pdf->download($req->nama.'.pdf');
   
}
   public function hapus(Request $req,$hapus){
    $siswa=Siswa::where('id',$hapus);
    $siswa_data = $siswa->get();
    if(file_exists($siswa_data[0]->foto_skhu)){
        unlink($siswa_data[0]->foto_skhu);
    }
    if(file_exists($siswa_data[0]->foto_ijazah)){
        unlink($siswa_data[0]->foto_ijazah);
 
    }
    if(file_exists($siswa_data[0]->foto)){
        unlink($siswa_data[0]->foto);
 
    }
    $siswa->delete();
    return redirect()->back()->with(['success'=>"data berhasil dihaus"]);
    }
    public function ubah(Request $req,$ubah){
   
    }
    public function print(){
        return Excel::download(new Pendaftaran,'Pendaftaran Siswa Tahun '.date('Y').'.xlsx');
    }
    public function terima($detail){
    $siswa=Siswa::where('id',$detail);
    $siswa->update(['status'=>'1']);
    return redirect()->back()->with(['success'=>'data berhasil diubah']);
    }
    public function rekap(){
    
    }
    public function detail($print){
        $print = Siswa::where('id',$print)->get(["nama",
        "kelurahan",
        "kecamatan",
        "alamat",
        "no_hp",
        "tgl_lahir",
        "nisn",
        'kode_unik',
        'tahun_ajaran',
        "jenis_tempat_tinggal",
        "nik",
        "jk",
        "Ijazah",
        "skhu",
        "un_smp",
        "tempat_lahir",
        "agama",
        "sd",
        "smp",
        "transportasi",
        "no_tel",
        "email",
        "kps",
        "kph",
        "kip",
        "tinggi",
        "berat",
        "status",
        "jarak",
        "penghasilan_ayah",
        "penghasilan_wali",
        "penghasilan_ibu",
        "nama_ayah",
        "nama_ibu",
        "nama_wali",
        "keadaan_ayah",
        "keadaan_ibu",
        "keadaan_wali",
        "pekerjaan_ibu",
        "pekerjaan_ayah",
        "pekerjaan_wali",
        "kabupaten",
        "waktu",
        "saudara",
        "kode_pos",
        "kebutuhan_khusus_wali",
        "kebutuhan_khusus_ibu",
        "kebutuhan_khusus_ayah",
        "jurusan",
        "pendidikan_ayah",
        "pendidikan_ibu",
        "pendidikan_wali",
        "tanggal_lahir_ibu",
        "tanggal_lahir_ayah",
        "tanggal_lahir_wali",
        "rt",
        "rw",
        "Jalan"]);
        $kelurahans=Kecamatan::where('regency_id',$print[0]->kabupaten)->get();
            for($i=0;$i<count($kelurahans);$i++) {
                $print[0]->kec .= "<option value='".$kelurahans[$i]->id."'>".$kelurahans[$i]->name."</option>";
            }
           
        
            $kelurahans=Kelurahan::where('district_id',$print[0]->kecamatan)->get();
        
            for($i=0;$i<count($kelurahans);$i++) {
                $print[0]->kel .= "<option value='".$kelurahans[$i]->id."'>".$kelurahans[$i]->name."</option>";
            } 
        return $print;
    }
    public function tampil()
    {
        $data = Siswa::where('status',0)->get();
        return DataTables::of($data)
              ->addIndexColumn()
               ->addColumn('aksi', function($row){
                       $btn = '<a class="hapus btn-danger btn-sm" data-id="'.$row->id.'">hapus</a>'.'&nbsp; <a class="ubah btn-warning btn-sm" data-id="'.$row->id.'">Ubah</a>';
                     return $btn;
                })->addColumn('jurusan', function($row){
                   switch($row->jurusan){
                    case 1 :
                        return "OTKP";
                        break;
                    case 2 :
                            return "AKL";
                            break;
                    case 3 :
                            return "BDP";
                            break;
                    case 4 :
                            return "DKV";
                            break;
                            case 5 :
                                return "TKJT";
                                break;
                   } 
               

             })->rawColumns(['aksi'])
                ->make(true);
    }
}