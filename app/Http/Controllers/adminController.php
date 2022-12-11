<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Sekolah;
use App\Models\Siswa;
use App\Models\Staff;
use App\Models\komentar;
use App\Models\Saran;

class adminController extends Controller
{
    public function halaman($req)
    {
        return $this->$req();
    }
    public function kelolaBerita()
    {
        return view('admin.kelolaBerita');
    }
    public function kelolaFoto()
    {
        return view('admin.kelolaFoto');
    }
    public function kelolaSaran()
    {
        return view('admin.kelolaSaran');
    }
    public function home()
    {

        $staff = [];
        $staff['staff']= Staff::get()->count();
        $staff['pria']=Staff::where('jk','pria')->get()->count();
         $staff['wanita']=Staff::where('jk','wanita')->get()->count();
         $staff['siswa']=Siswa::where('status',0)->get()->count();
         $staff['siswa_pria']=Siswa::where('status',0)->where('jk',1)->get()->count();
         $staff['siswa_wanita']=Siswa::where('status',0)->where('jk',2)->get()->count();
        $staff['berita']=Berita::get()->count();
        $staff['komentar']=Komentar::get()->count();
        $staff['suka']=Berita::get('suka')->count();
        $staff['tidak_suka']=Berita::get('tidak_suka')->count();
        $staff['saran_fasilitas']= Saran::where('kategori','fasilitas')->get()->count();
      
        $staff['saran_biaya']= Saran::where('kategori','biaya')->get()->count();
        $staff['saran_pengajaran']= Saran::where('kategori','pengajaran')->get()->count();
        $staff['saran_guru']= Saran::where('kategori','guru')->get()->count();
        $staff['saran_siswa']= Saran::where('kategori','siswa')->get()->count();
        $staff['saran_matpel']= Saran::where('kategori','mata pelajaran')->get()->count();
        return view('adminhome',['staff'=>$staff]);
    }
    public function kelolaPendaftaran()
    {
        $kabupatens=Kabupaten::where('province_id','32')->get(['name','id']);
        for($i=0; $i<count($kabupatens);$i++){
            $kabname[]=$kabupatens[$i]->name;
            $kabid[]=$kabupatens[$i]->id;
        }
        
            return view('admin.kelolaSiswa',['kabname'=>$kabname,'kabid'=>$kabid]);
    }
    public function berubah(Request $req)
    {
        $isi = '';
        if(isset($req->kecamatan)){
            $kelurahans=Kelurahan::where('district_id',$req->kecamatan)->get();
        
            for($i=0;$i<count($kelurahans);$i++) {
                $isi .= "<option value='".$kelurahans[$i]->id."'>".$kelurahans[$i]->name."</option>";
            }
            return $isi;
        }
        else if(isset($req->kabupaten)){
        
            $kelurahans=Kecamatan::where('regency_id',$req->kabupaten)->get();
        
            for($i=0;$i<count($kelurahans);$i++) {
                $isi .= "<option value='".$kelurahans[$i]->id."'>".$kelurahans[$i]->name."</option>";
            }
           return $isi;
        }
       
    
    }
    public function kelolaProfil()
    {
        $sekolah= Sekolah::get();
        $sekolah[0]->deskripsi=str_replace(array("\n","\r"),"",$sekolah[0]->deskripsi);
    return view('admin.kelolaSekolah',['sekolah'=>$sekolah[0]]);
    }
    public function kelolaStaff()
    {
        return view('admin.kelolaStaff');
    }
    public function kelolaAdmin(){
        return view('admin.kelolaAdmin');
    }
}
