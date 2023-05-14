<?php

namespace App\Http\Controllers;

use App\Exports\Pendaftaran;
use App\Exports\rekapLaporanSheet;
use App\Models\data_cicilan;
use App\Models\data_pembayaran;
use App\Models\data_tunggakan;
use App\Models\jurusan;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelas;
use App\Models\Kelurahan;
use App\Models\Siswa;
use App\Models\tahun_ajaran;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;
class PendaftaranController extends Controller
{
    public function mulai()
    {
        $thn_ajaran = tahun_ajaran::where('tahun_ajaran',date('Y').'/'.date('Y',strtotime(' +1 year')))->exists();
        if($thn_ajaran==false){
            $tahun = tahun_ajaran::create(['tahun_ajaran'=>date('Y').'/'.date('Y',strtotime(' +1 year')),'status'=>1]);           
            $jurusan = jurusan::get();
            foreach($jurusan as $jurusans){
                kelas::create([
                    "nama"=>"X ".$jurusans->jurusan.' 1',
                    "posisi"=>1,
                    "jumlah"=>35,
                    "angkatan"=>date('Y').'/'.date('Y',strtotime(' +1 year')),
                    "jumlah_terisi"=>0,
                    "jurusan"=>$jurusans->id,
                ]);
            }
            return redirect()->back();
        }
        else{
            return redirect()->back()->withErrors('tahun ajaran sudah ada');
        }
    }   
    public function berhenti()
    {
        $thn_ajaran = tahun_ajaran::where('status',1);
        $thn_ajaran->update(['status'=>0]);
        $kelas2 = Kelas::where('angkatan',date('Y',strtotime(' -1 year')).'/'.date('Y'))->get();
        $kelas3 = kelas::where('angkatan',date('Y',strtotime(' -2 year')).'/'.date('Y',strtotime(' -1 year')))->get();
        $alumni= kelas::where('angkatan',date('Y',strtotime(' -3 year')).'/'.date('Y',strtotime(' -2 year')))->get(); 
        Siswa::where('status',2)->update(['status'=>1]);
        foreach($kelas2 as $naik){
            $jurusan = jurusan::where('id',$naik->jurusan)->get();
            Kelas::where('id',$naik->id)->update([
                'nama'=>"XI ".$jurusan[0]->jurusan.' '.$naik->posisi
            ]);
        }
        foreach($kelas3 as $naik){
            $jurusan = jurusan::where('id',$naik->jurusan)->get();
            Kelas::where('id',$naik->id)->update([
                'nama'=>"XII ".$jurusan[0]->jurusan.' '.$naik->posisi
            ]);
           
        }
        foreach($alumni as $naik){
            $jurusan = jurusan::where('id',$naik->jurusan)->get();
            Siswa::where('kelas',$naik->id)->update(['status'=>-1]);
            tahun_ajaran::where('tahun_ajaran',$naik->angkatan)->update(['status'=>-1]);
        }
        return redirect()->back();
    }
    public function show() {
        $kabupatens = Kabupaten::where('province_id', '32')->get(['name', 'id']);
        $tahun = tahun_ajaran::where('status', 1)->exists();
        $jurusan = jurusan::get();
        for ($i = 0; $i < count($kabupatens); $i++) {
            $kabname[] = $kabupatens[$i]->name;
            $kabid[] = $kabupatens[$i]->id;
        }
        if ($tahun) {
            return view('pendaftaran', ['kabname' => $kabname, 'kabid' => $kabid, 'tahun_ajaran' => 1, 'jurusan' => $jurusan]);
        } else {
            return view('pendaftaran', ['kabname' => $kabname, 'kabid' => $kabid, 'jurusan' => $jurusan]);
        }
    }
   public function tambah(Request $req){
    $foto="";
    $foto_ijazah="";
    $foto_skhu="";

   $req->validate([
       'nama'=>'required',
       'email'=>'required',
       'foto'=>'nullable|max:300000|mimes:jpg,png,pdf',
       'foto_skhu'=>'nullable|max:300000|mimes:jpg,png,pdf',
       'foto_ijazah'=>'nullable|max:300000|mimes:jpg,png,pdf'
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
     $siswa = Siswa::create([
        "nama"=>$req->nama,
        "kelurahan"=>$req->kelurahan,
        "kecamatan"=>$req->kecamatan,
        "alamat"=>$req->jalan.' '.'RT  '.$req->rt.'RW '.$req->rw.' '.$kelurahan[0]->name.' '.$kecamatan[0]->name.$kabupaten[0]->name.' Jawa Barat',
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
        "point"=>0,
        "jenis_siswa"=>1,
        "total_tunggakan"=>0,
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
        'kode_unik'=>$kode_unik,
        'kelas'=>null,
       
        ]
    );
 
   $C = Siswa::where('kode_unik',$kode_unik)->where('nama',$req->nama)->get()->toArray(); 
   $data = Carbon::parse($C['0']['tgl_lahir'])->translatedFormat(' d F Y');
   $C['0']['tgl_lahir'] = $data;
   $data = Carbon::parse($C[0]['tanggal_lahir_ayah'])->translatedFormat('d F Y');
   $C[0]['tanggal_lahir_ayah']=$data;
   $data = Carbon::parse($C[0]['tanggal_lahir_ibu'])->translatedFormat('d F Y');
   $C[0]['tanggal_lahir_ibu']=$data;
   if($C[0]['tanggal_lahir_wali']!=null){
   $data = Carbon::parse($C[0]['tanggal_lahir_wali'])->translatedFormat('d F Y');
   $C[0]['tanggal_lahir_wali']=$data;
    }
    $C[0]['kecamatan']=$kecamatan[0]->name;
    $C[0]['kabupaten']=$kabupaten[0]->name;
    $C[0]['kelurahan']=$kelurahan[0]->name;
    $C[0]['jurusan']=Jurusan::where('id',$C[0]['jurusan'])->get();
    $C[0]['jurusan']= $C[0]['jurusan'][0]->jurusan; 
    $tanggal=carbon::parse(date(now()))->translatedFormat('d F Y');
     $pdf = Pdf::loadView('/pdf/pendaftaran',['req'=>$C[0],'tanggal'=>$tanggal]);
     $pdf = Pdf::loadView('/pdf/pendaftaran',['req'=>$C[0],'tanggal'=>$tanggal]);
    return $pdf->download($C[0]['nama'].'.pdf');

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
       $siswa =Siswa::where('id',$ubah)->get();
        $foto=$siswa[0]->foto;
        $foto_ijazah=$siswa[0]->foto_ijazah;
        $foto_skhu=$siswa[0]->foto_skhu;
        $siswa =Siswa::where('id',$ubah);
        $req->validate([
            "nama"=>"required",
            "kelurahan"=>"required",
            "kecamatan"=>"required",
            "no_hp"=>"nullable",
            "tgl_lahir"=>"required",
            "nisn"=>"nullable|numeric|digits_between:10,11|unique:siswa",
            "jenis_tempat_tinggal"=>"required",
            "nik"=>"nullable|numeric|digits_between:16,17",
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
     
        $name = Auth::user()->name;
        $siswa->update([
            "nama"=>$req->nama,
            "kelurahan"=>$req->kelurahan,
            "kecamatan"=>$req->kecamatan,
            "alamat"=>$req->jalan.' '.'RT  '.$req->rt.'RW '.$req->rw.' '.$kelurahan[0]->name.' '.$kecamatan[0]->name.$kabupaten[0]->name.' Jawa Barat',
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
            'status'=>0,
            'tahun_ajaran'=>$thn_ajaran,
            'kode_pos'=>$req->kode_pos,
            'kode_unik'=>$kode_unik,
            "admin"=>$name
            ]
        );
        return redirect('/admin/kelolaPendaftaran')->with(['success'=>'data berhasil diubah']);
       
    }
    public function cetakKwitansi($data1)
    {
        $data = data_cicilan::where('noPembayaran',$data1)->with(['tunggakan'])->get();
 
        $nama = Siswa::where('id',$data[0]->id_siswa)->get('nama');
        $total = data_cicilan::where('noPembayaran',$data1)->sum('pembayaran');
        $totcil = data_cicilan::where('id_siswa',$data[0]->id_siswa)->whereDate('created_at','<=',$data[0]->created_at)->sum('pembayaran');
        $tunggakan = data_tunggakan::where('id_siswa',$data[0]->id_siswa)->sum('total_tunggakan');
        $sisa = $tunggakan - $totcil;
        $pdf = Pdf::loadView('/pdf/kwitansi',['tunggakans'=>$data,'nama'=>$nama,'total'=>$total,'tagihan'=>$sisa,'totcil'=>$totcil])->setPaper('a4','landscape');
         return $pdf->download('kwitansi.pdf');
    }
    public function print(){
        
        return Excel::download(new rekapLaporanSheet,'Pendaftaran Siswa Tahun '.date('Y').'.xlsx');
    }
    public function terima($detail,Request $req){
    $siswa=Siswa::where('id',$detail);
    $isi=$siswa->get();
    
    $thn_ajaran = date('Y').'/'.date('Y',strtotime(' +1 year'));
    $pembayarans = data_pembayaran::where('semester',1)->orWhere('semester','7')->orWhere('semester','8')->orWhere('semester','9')->get();
    $i=0;
    $total=0;
    $tagihan=0;
    $frak = date("DmY").$detail.rand(1,100);
    foreach($pembayarans as $pembayaran){
    $nama = str_replace(",","_",$pembayaran->nama); 
    $nama = str_replace(" ","_",$nama);
    $nama = str_replace(".","_",$nama);
    if($req->$nama==null){
        $req->$nama=0;
    }
       if($pembayaran->nominal==$req->$nama){
        $status=1;
       }
       else if($pembayaran->nominal>$req->$nama){
        $status=0;
    } 
    else{
    return redirect('/admin/kelolaPendaftaran')->withError('data salah');
    }
         data_tunggakan::create([
            "jenis_tunggakan"=>$pembayaran->nama,
            "id_siswa"=>$detail,
            "tunggakan"=>$pembayaran->nominal,
            "total_bayar"=>$req->$nama,
            "semester"=>1,
            "total_tunggakan"=>$pembayaran->nominal,
            "jenis_pembayaran"=>$pembayaran->nama,
            'status'=>$status,
            'tahun_ajaran'=>$thn_ajaran
        ]);
        $dataT = data_tunggakan::where('id_siswa',$detail)->where("jenis_pembayaran",$pembayaran->nama)->first();
        
        data_cicilan::create([
            "noPembayaran"=>$frak,
            "id_siswa"=>$detail,
            "id_tunggakan"=>$dataT->id,
            'pembayaran'=>$dataT->total_bayar,
            'admin'=>Auth::user()->name
        ]);
        $total+=$dataT->total_bayar;
        $tagihan+=$pembayaran->nominal;
        
    }
    $dataZ= data_cicilan::where('id_siswa',$detail)->with(['tunggakan'])->get();
    $nama = Siswa::where('id',$detail)->get('nama');
    $kelas = Kelas::where('jurusan',$isi[0]->jurusan)->where('jumlah_terisi','<=','0');
    if($kelas->exists()){
        $x=$kelas->get();
        $siswa->update(['kelas'=>$x[0]->id]);
        $kelas->update(['jumlah_terisi'=>$x[0]->jumlah_terisi+1]);
    }
    else{
     $kelas = Kelas::where('jurusan',$isi[0]->jurusan)->max('id');
        $kelas = kelas::where('id',$kelas)->get();
        $jurusans=jurusan::where('id',$isi[0]->jurusan)->get(); 
        $kelas = kelas::create([
            "nama"=>"X ".$jurusans[0]->jurusan.' '.($kelas[0]->posisi+1),
            "posisi"=>1,
            "jumlah"=>35,
            "angkatan"=>date('Y').'/'.date('Y',strtotime(' +1 year')),
            "jumlah_terisi"=>1,
            "jurusan"=>$jurusans[0]->id,
        ]);
    }
    
    $siswa->update(['status'=>'2']);
    $pdf = Pdf::loadView('/pdf/kwitansi',['tunggakans'=>$dataZ,'nama'=>$nama,'tagihan'=>($tagihan-$total),'totcil'=>$total,'total'=>$total]);
    return $pdf->download('kwitansi.pdf');
    }
    public function surat($id){
        $C = Siswa::where('id',$id)->get()->toArray(); 
        $data = Carbon::parse($C['0']['tgl_lahir'])->translatedFormat(' d F Y');
        $C['0']['tgl_lahir'] = $data;
        $data = Carbon::parse($C[0]['tanggal_lahir_ayah'])->translatedFormat('d F Y');
        $C[0]['tanggal_lahir_ayah']=$data;
        $data = Carbon::parse($C[0]['tanggal_lahir_ibu'])->translatedFormat('d F Y');
        $C[0]['tanggal_lahir_ibu']=$data;
        if($C[0]['tanggal_lahir_wali']!=null){
        $data = Carbon::parse($C[0]['tanggal_lahir_wali'])->translatedFormat('d F Y');
        $C[0]['tanggal_lahir_wali']=$data;
         }
         $kelurahan=Kelurahan::where('id', $C[0]['kelurahan'])->get('name');
        $kecamatan= Kecamatan::where('id',$C[0]['kecamatan'])->get('name');
        $kabupaten= Kabupaten::where('id',$C[0]['kabupaten'])->get('name');
        $C[0]['kelurahan']=$kelurahan[0]->name;
        $C[0]['kabupaten']=$kabupaten[0]->name;
        $C[0]['kecamatan']=$kecamatan[0]->name;
        $C[0]['jurusan']=Jurusan::where('id',$C[0]['jurusan'])->get();
        $C[0]['jurusan']= $C[0]['jurusan'][0]->jurusan; 
         $tanggal=carbon::parse(date(now()))->translatedFormat('d F Y');
          $pdf = Pdf::loadView('/pdf/pendaftaran',['req'=>$C[0],'tanggal'=>$tanggal]);
         return $pdf->download($C[0]['nama'].'.pdf');
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
    public function cicil($data,Request $req)
    {   $total=0;
                $tagihan=0;
        $frak = date("DmY").$data.rand(1,100);
        $pembayarans = data_tunggakan::where('id_siswa',$data)->get();
        foreach($pembayarans as $pembayaran){
        $nama = str_replace(",","_",$pembayaran->jenis_pembayaran); 
        $nama = str_replace(" ","_",$nama);
        $nama = str_replace(".","_",$nama);
        if($req->$nama==null){
            $req->$nama=0;
        }
           if($pembayaran->total_tunggakan==($req->$nama+$pembayaran->total_bayar)){
            $status=1;
           }
           else if($pembayaran->total_tunggakan>$req->$nama){
            $status=0;
        } 
        else{
        return redirect('/admin/kelolaPendaftaran')->withError('data salah');
        }
        data_tunggakan::where('id',$pembayaran->id)->update([
            'total_bayar'=>($pembayaran->total_bayar+$req->$nama),
            'status'=>$status
        ]);
            data_cicilan::create([
                "noPembayaran"=>$frak,
                "id_siswa"=>$data,
                "id_tunggakan"=>$pembayaran->id,
                'pembayaran'=>$req->$nama,
                'admin'=>Auth::user()->name
            ]);
            $total+=$req->$nama;
            $tagihan+=$pembayaran->total_tunggakan;
       
        }

        $nama = Siswa::where('id',$data)->get('nama');
        $totcil =  data_tunggakan::where('id_siswa',$data)->sum("total_bayar");
        $dataZ= data_cicilan::where('noPembayaran',$frak)->with(['tunggakan'])->get();
        $pdf = Pdf::loadView('/pdf/kwitansi',['tunggakans'=>$dataZ,'nama'=>$nama,'total'=>$total,'tagihan'=>($tagihan-$totcil),'totcil'=>$totcil])->setPaper('a4','landscape');
         return $pdf->download('kwitansi.pdf'); 
    }

    public function cicilTampil($data)
    {
        return data_tunggakan::where('id_siswa',$data)->get();
    }
    public function hapusKwitansi($data)
    {
        $isi = data_cicilan::where('noPembayaran',$data)->get();
        $cek = data_cicilan::where('id_siswa',$isi[0]->id_siswa)->where('noPembayaran','!=',$data)->exists();
        if($cek==false){
            Siswa::where('id',$isi[0]->id_siswa)->update(['status'=>0]);
            data_tunggakan::where('id_siswa',$isi[0]->id_siswa)->delete();
            data_cicilan::where('noPembayaran',$data)->delete();
        }
       else if($cek==true){
            foreach($isi as $is){
               $tunggak=data_tunggakan::where('id',$is->id_tunggakan)->get('total_bayar');
                data_tunggakan::where('id',$is->id_tunggakan)->update(['total_bayar'=>$tunggak[0]->total_bayar-$is->pembayaran]);
               data_cicilan::where('noPembayaran',$data)->delete();
            }
        }
        return redirect('/admin/kelolaPendaftaran')->with(['success'=>'data berhasil diubah']);
    }
    public function riwayat($data)
    {
       $cicilan =  data_cicilan::where('id_siswa',$data)->get()->unique('noPembayaran');
       $cil0=[]; 
       foreach($cicilan as $cil){
        $cil0 []=$cil;
        }
       return $cil0;
    }
    public function tampil()
    {
        $data = Siswa::where('status',0)->orWhere('status',2)->get();
        return DataTables::of($data)
              ->addIndexColumn()
               ->addColumn('aksi', function($row){
                if($row->status==0){     
                $btn = '<a data-id="'.$row->id.'" class="hapus btn btn-danger btn-sm"><i class="fa fa-close"></i>Tolak</a>'.'&nbsp;&nbsp;&nbsp;<a data-id="'.$row->id.'" class="detail btn btn-success btn-sm"><i class="fa fa-eye"></i>&nbsp;Detail</a>&nbsp;&nbsp;&nbsp;'.'<a class="terima btn btn-primary btn-sm" data-id="'.$row->id.'"><i class="fa fa-check"></i>&nbsp;Terima</a>&nbsp;&nbsp;'.'&nbsp;&nbsp;&nbsp;<a data-id="'.$row->id.'" class="ubah btn btn-warning btn-sm"> <i class="fa fa-pen"></i>Edit</a>&nbsp;&nbsp;&nbsp;'.'<a href="/admin/kelolaPendaftaran/surat/'.$row->id.'" class="btn btn-warning btn-sm"><i class="fa fa-print"></i>Print</a>';
                }
                else{
                    $tunggakan = data_tunggakan::where('status',0)->count();
                    if($tunggakan==0){
                    $btn = '<a data-id="'.$row->id.'" class="riwayat btn btn-danger btn-sm">Riwayat Pembayaran</a>';
                    }
                    else{
                        $btn = '<a data-id="'.$row->id.'" class="riwayat btn btn-danger btn-sm">Riwayat Pembayaran</a>'.'&nbsp;&nbsp;<a data-id="'.$row->id.'" class="cicil btn btn-success btn-sm">Cicil</a>'.'<a href="/admin/kelolaPendaftaran/surat/'.$row->id.'" class="btn btn-warning btn-sm"><i class="fa fa-print"></i>Print</a>';
                    }
                }  
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
               

             })->addColumn('created_at',function($row){
                return $row->created_at->format('d M y');
             })->addColumn('keterangan',function($row){
                $foto=" ";
                if($row->foto!=""){
                    $foto="<i class='fa fa-check'><i>Foto <br>";
                }
                if($row->foto_skhu!=""){
                    $foto.="<i class='fa fa-check'><i>SKHU <br>";
                }
             
                if($row->foto_ijazah!=""){
                    $foto.="<i class='fa fa-check'><i>Ijazah ";
                }
                return $foto;
             })->rawColumns(['aksi','keterangan'])
                ->make(true);
    }
}
