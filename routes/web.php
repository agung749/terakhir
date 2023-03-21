<?php

use Illuminate\Support\Facades\Route;
use App\Models\Kabupaten;
use App\Models\Berita;
use App\Models\Gallery;
use App\Models\jurusan;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\komentar;
use App\Models\Sekolah;
use App\Models\Siswa;
use App\Models\Staff;
use App\Models\tahun_ajaran;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
route::get('/data/2', function(){
    $req=Siswa::get()->toArray();
  
    $bulan=Carbon::now()->locale('id');
    $data = Carbon::parse($req[0]['tgl_lahir'])->translatedFormat(' d F Y');
    
    $req[0]['tgl_lahir']=$data;
    $data = Carbon::parse($req[0]['tanggal_lahir_ayah'])->translatedFormat('d F Y');
    $req[0]['tanggal_lahir_ayah']=$data;
    $data = Carbon::parse($req[0]['tanggal_lahir_ibu'])->translatedFormat('d F Y');
    $req[0]['tanggal_lahir_ibu']=$data;
    if(  $req[0]['tanggal_lahir_wali']!=null){
    $data = Carbon::parse($req[0]['tanggal_lahir_wali'])->translatedFormat('d F Y');
    $req[0]['tanggal_lahir_wali']=$data;
    }
    $tanggal = $bulan->dayName.' '.$bulan->monthName.' '. $bulan->year;
    $pdf = Pdf::loadView('/pdf/pendaftaran',['req'=>$req[0],'tanggal'=>$tanggal]);
   
    $pdf->setPaper(array(0,0,609.4488,935.433), 'portrait');
	
    return $pdf->download('a.pdf');
});
Route::get('/', function () {
    $beritas = Berita::latest()->paginate(2);
    $sekolah = Sekolah::get();
    $fotos = Gallery::get();
    $kategori=[];
    for($i=1;$i<=11;$i++){
    $kategori[$i-1]=  Berita::where('kategori',$i)->get()->count();
    }
    return view('welcome',['beritas'=>$beritas,'sekolah'=>$sekolah[0],'fotos'=>$fotos,'kategori'=>$kategori]);
})->name('home');
Route::get('/berita/{judul}', function ($judul) {
    $kategori=[];
    for($i=1;$i<=11;$i++){
    $kategori[$i-1]= $beritas = Berita::where('kategori',$i)->get()->count();
    }
    
    $judul = str_replace("-"," ",$judul);
    $rekomen=Berita::latest()->limit('7')->get();
    $beritas = Berita::where('judul','LIKE','%'.$judul.'%')->with('komentar')->get();
    return view('berita',['berita'=>$beritas[0],'rekomen'=>$rekomen,'kategori'=>$kategori]);
    
})->name('berita');
Route::get('/jam',function(){
date_default_timezone_set('Asia/Jakarta');//Menyesuaikan waktu dengan tempat kita tinggal
$timestamp = date('H:i:s');//Menampilkan Jam Sekarang

return $timestamp;
});
Route::get('/staff/{judul}', function ($judul) {
    $kategori=[];
    $staff=[ 'Guru',
    'Caraka',
    'TU',
    'Struktural'];
    for($i=0;$i<=3;$i++){
    $kategori[$i]=  Staff::where('jenis',$staff[$i])->get()->count();
    }
    $beritas=staff::where('id',$judul)->get();
    return view('profile',['profile'=>$beritas,'kategori'=>$kategori]);
    
})->name('berita');
Route::post('/saran', [App\Http\Controllers\SaranController::class,'tambah']);
Route::get('/berita/kategori/{judul}', function ($kategori1) {
    $kategori=[];
    for($i=1;$i<=11;$i++){
    $kategori[$i-1]= $beritas = Berita::where('kategori',$i)->get()->count();
    }
    switch($kategori1){
        case 1:
            $judul="Data Berita Akademik";
        break;
        case 2:
            $judul="Data Berita Bisnis";
        break;
        case 3:
            $judul="Data Berita Pengetahuan";
        break;
        case 4:
            $judul="Data Berita English Club";
        break;
        case 5:
            $judul="Data Berita English Pramuka";
        break;
        case 6:
            $judul="Data Berita English Osis";
        break;
        case 7:
            $judul="Data Berita English OTKP";
        break;
        case 8:
            $judul="Data Berita English TKJT";
        break;
        case 9:
            $judul="Data Berita English BDP";
        break;
        case 10:
            $judul="Data Berita English AKL";
        break;
        case 11:
            $judul="Data Berita English GRF";
        break;

    }
    $beritas = Berita::where('kategori',$kategori1)->paginate(6);
    return view('daftar-berita',['cari'=>$beritas,'judul'=>$judul,'kategori'=>$kategori,]);
    
});
route::post('/berubah',function (Request $req)
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
   

});
Route::get('/berita', function (Request $req) {
    $kategori=[];
  
    for($i=1;$i<=11;$i++){
    $kategori[$i-1]= Berita::where('kategori',$i)->get()->count();
    }
 
    if(isset($req->cari)){
    $cari = Berita::where('judul','like','%'.$req->cari.'%')->paginate(5);
   
    }
    else{
        $cari = Berita::paginate(3);
    }
    return view('daftar-berita',['cari'=>$cari,'kategori'=>$kategori]);
});
Route::get('/staff', function (Request $req) {
    $kategori=[];
    $staff=[ 'Guru',
    'Caraka',
    'TU',
    'Struktural'];
    for($i=0;$i<=3;$i++){
    $kategori[$i]=  Staff::where('jenis',$staff[$i])->get()->count();
    }
 
    if(isset($req->cari)){
    $cari = Staff::where('judul','like','%'.$req->cari.'%')->paginate(6);
    }
    else{
        $cari = Staff::paginate(6);
    }
    return view('staff',['cari'=>$cari,'kategori'=>$kategori]);
});
Route::get('/staff/kategori/{judul}', function ($kategori1) {
    $kategori=[];
    $staff=[ 'Guru',
    'Caraka',
    'TU',
    'Struktural'];
    for($i=0;$i<=3;$i++){
    $kategori[$i]=  Staff::where('jenis',$staff[$i])->get()->count();
    }
    switch($kategori1){
        case 'Guru':
            $judul="Data Guru";
        break;
        case 'Caraka':
            $judul="Data Caraka";
        break;
        case 'TU':
            $judul="Data TU";
        break;
        case 'Struktural':
            $judul="Data Struktural";
        break;
    }
    $beritas = Staff::where('jenis',$kategori1)->get();
    return view('staff',['cari'=>$beritas,'judul'=>$judul,'kategori'=>$kategori,]);
    
});
Route::get('/berita/like/{judul}', function ($judul) {
    $judul = str_replace("-"," ",$judul);
 
    $berita = Berita::where('judul','LIKE','%'.$judul.'%');
    $like = Berita::where('judul','LIKE','%'.$judul.'%')->get('suka');
    $berita->update([
        'suka'=>$like[0]->suka+1
    ]);
    return redirect()->back();
   
})->name('suka');
Route::get('/berita/dislike/{judul}', function ($judul) {
    $judul = str_replace("-"," ",$judul);
 
    $berita = Berita::where('judul',$judul);
    $like = Berita::where('judul','LIKE','%'.$judul.'%')->get('tidak_suka');
    $berita->update([
        'tidak_suka'=>$like[0]->suka+1
    ]);
    return redirect()->back();
})->name('tidak_suka');
Route::post('/komentar/{judul}',function (Request $req,$judul)
{
    $judul = str_replace("-"," ",$judul);
    $berita = Berita::where('judul','LIKE','%'.$judul.'%')->get('id');
   $komentar = new komentar;
   $komentar->create([
    'nama'=>$req->nama,
    'komentar'=>$req->komentar,
    'berita_id'=>$berita[0]->id
   ]);
   return redirect()->back();
});
Route::get('/home', function () {
    return view('welcome');
})->name('home');
route::get('/spw',[App\Http\Controllers\SpwController::class,'tampil']);
route::get('/spw/{data}',[App\Http\Controllers\SpwController::class,'data']);
Route::get('/prestasi', function () {
    return view('prestasi');
})->name('home');
Route::get('/pendaftaran', function () {
    $kabupatens=Kabupaten::where('province_id','32')->get(['name','id']);
    $tahun = tahun_ajaran::where('status',1)->exists();
    $jurusan = jurusan::get();
    for($i=0; $i<count($kabupatens);$i++){
        $kabname[]=$kabupatens[$i]->name;
        $kabid[]=$kabupatens[$i]->id;
    }
      if($tahun){
        return view('pendaftaran',['kabname'=>$kabname,'kabid'=>$kabid,'tahun_ajaran'=>1,'jurusan'=>$jurusan]);
    }
    else{
         return view('pendaftaran',['kabname'=>$kabname,'kabid'=>$kabid,'jurusan'=>$jurusan]);
         }
    
});
Route::group(['prefix'=>'/adminSPW','middleware'=>'user:adminSPW'],function(){


});
Route::group(['prefix'=>'/kepalaSekolah','middleware'=>'user:kepala'],function(){


});
Route::group(['prefix'=>'/wirausaha','middleware'=>'user:wirausaha'],function(){
    route::get('/home',function(){  
        return view('spw.spwHome');
    });
    route::post('/spwHome/tampil',[App\Http\Controllers\PemasukanController::class,'tampil2']);
 
    route::post('/toko/tambah',[App\Http\Controllers\TokoController::class,'tambah']);
    route::post('/toko/ubah/{tambah}',[App\Http\Controllers\TokoController::class,'ubah']);
    route::get('/toko/hapus/{tambah}',[App\Http\Controllers\TokoController::class,'hapus']);
    route::get('/toko/detail/{tambah}',[App\Http\Controllers\TokoController::class,'detail']);
    route::get('/toko/tampil',[App\Http\Controllers\TokoController::class,'tampil']);
    route::get('/toko',[App\Http\Controllers\TokoController::class,'show']);
    route::post('/pemasukan/tambah',[App\Http\Controllers\PemasukanController::class,'tambah']);
    route::post('/pemasukan/ubah/{tambah}',[App\Http\Controllers\PemasukanController::class,'ubah']);
    route::get('/pemasukan/hapus/{tambah}',[App\Http\Controllers\PemasukanController::class,'hapus']);
    route::get('/pemasukan/detail/{tambah}',[App\Http\Controllers\PemasukanController::class,'detail']);
    route::get('/pemasukan/tampil',[App\Http\Controllers\PemasukanController::class,'tampil']);
    route::get('/pemasukan/print',[App\Http\Controllers\PemasukanController::class,'print']);
    route::get('/pemasukan',[App\Http\Controllers\PemasukanController::class,'show']);

});
route::get('/user/ubah',function(){
    return view('ubah-password');
});
route::post('user/password-ubah',function(Request $req){
   $user = User::where('id',Auth::user()->id);
   if(Auth::attempt(['email'=>Auth::user()->email,'password'=>$req->password_lama])){
    $req->validate([
        'password'=>"min:8|confirmed"
    ]);
    $user->update(['password'=>Hash::make($req->password)]);
    return redirect('/user/ubah')->with(['salah'=>true]);
   }
    

});

route::post('/pendaftaran/tambah/',[App\Http\Controllers\PendaftaranController::class,'tambah']);
Route::group(['prefix'=>'/guru','middleware'=>'user:guru'],function(){
    route::get('/{admin}',[App\Http\Controllers\guruController::class,'halaman']);
});
Route::group(['prefix'=>'/admin','middleware'=>'user:admin'],function(){
    route::get('/{admin}',[App\Http\Controllers\adminController::class,'halaman']);
    route::post('/berubah',[App\Http\Controllers\adminController::class,'berubah']);
    route::get('/kelolaPendaftaran/mulai',[App\Http\Controllers\PendaftaranController::class,'mulai']);
    route::get('/kelolaPendaftaran/berhenti',[App\Http\Controllers\PendaftaranController::class,'berhenti']);
 
    route::get('/kelolaPendaftaran/tampil',[App\Http\Controllers\PendaftaranController::class,'tampil']);
    route::get('/kelolaPendaftaran/detail/{detail}',[App\Http\Controllers\PendaftaranController::class,'detail']);
    route::post('/kelolaPendaftaran/tambah/',[App\Http\Controllers\PendaftaranController::class,'tambah']);
    route::post('/kelolaPendaftaran/ubah/{ubah}',[App\Http\Controllers\PendaftaranController::class,'ubah']);
    route::get('/kelolaPendaftaran/hapus/{hapus}',[App\Http\Controllers\PendaftaranController::class,'hapus']);
    route::get('/kelolaPendaftaran/print',[App\Http\Controllers\PendaftaranController::class,'print']);
    route::get('/kelolaPendaftaran/surat/{id}',[App\Http\Controllers\PendaftaranController::class,'surat']);
    route::get('/kelolaPendaftaran/rekap/',[App\Http\Controllers\PendaftaranController::class,'rekap']);
    route::get('/kelolaPendaftaran/terima/{terima}',[App\Http\Controllers\PendaftaranController::class,'terima']);
    route::get('/kelolaBerita/tampil',[App\Http\Controllers\BeritaController::class,'tampil']);
    route::get('/kelolaBerita/detail/{detail}',[App\Http\Controllers\BeritaController::class,'detail']);
    route::post('/kelolaBerita/tambah/',[App\Http\Controllers\BeritaController::class,'tambah']);
    route::post('/kelolaBerita/ubah/{ubah}',[App\Http\Controllers\BeritaController::class,'ubah']);
    route::get('/kelolaBerita/hapus/{hapus}',[App\Http\Controllers\BeritaController::class,'hapus']);
    route::get('/kelolaStaff/tampil',[App\Http\Controllers\StaffController::class,'tampil']);
    route::get('/kelolaStaff/detail/{detail}',[App\Http\Controllers\StaffController::class,'detail']);
    route::post('/kelolaStaff/tambah/',[App\Http\Controllers\StaffController::class,'tambah']);
    route::post('/kelolaStaff/import/',[App\Http\Controllers\StaffController::class,'import']);
    route::post('/kelolaStaff/ubah/{ubah}',[App\Http\Controllers\StaffController::class,'ubah']);
    route::get('/kelolaStaff/hapus/{hapus}',[App\Http\Controllers\StaffController::class,'hapus']);
    route::get('/kelolaStaff/print',[App\Http\Controllers\StaffController::class,'print']);
    route::get('/kelolaStaff/rekap/',[App\Http\Controllers\StaffController::class,'rekap']);
    route::get('/kelolaSiswa/tampil',[App\Http\Controllers\SiswaController::class,'tampil']);
    route::get('/kelolaSiswa/detail/{detail}',[App\Http\Controllers\SiswaController::class,'detail']);
    route::post('/kelolaSiswa/tambah/',[App\Http\Controllers\SiswaController::class,'tambah']);
    route::post('/kelolaSiswa/ubah/{ubah}',[App\Http\Controllers\SiswaController::class,'ubah']);
    route::get('/kelolaSiswa/hapus/{hapus}',[App\Http\Controllers\SiswaController::class,'hapus']);
    route::get('/kelolaSiswa/print',[App\Http\Controllers\SiswaController::class,'print']);
    route::get('/kelolaSiswa/rekap/',[App\Http\Controllers\SiswaController::class,'rekap']);
    route::get('/kelolaSekolah/tampil',[App\Http\Controllers\SekolahController::class,'tampil']);  
    route::post('/kelolaSekolah/ubah',[App\Http\Controllers\SekolahController::class,'ubah']);
    route::get('/kelolaGallery/tampil',[App\Http\Controllers\GalleryController::class,'tampil']);
    route::get('/kelolaGallery/detail/{detail}',[App\Http\Controllers\GalleryController::class,'detail']);
    route::post('/kelolaGallery/tambah/',[App\Http\Controllers\GalleryController::class,'tambah']);
    route::post('/kelolaGallery/ubah/{ubah}',[App\Http\Controllers\GalleryController::class,'ubah']);
    route::get('/kelolaGallery/hapus/{hapus}',[App\Http\Controllers\GalleryController::class,'hapus']);
    route::get('/kelolaSaran/tampil',[App\Http\Controllers\SaranController::class,'tampil']);
    route::get('/kelolaSaran/detail/{detail}',[App\Http\Controllers\SaranController::class,'detail']);
    route::get('/kelolaAdmin/tampil',[App\Http\Controllers\userControllers::class,'tampil']);
    route::post('/kelolaBerkas/ubah/{ubah}',[App\Http\Controllers\BerkasController::class,'ubah']);
    route::get('/kelolaBerkas/hapus/{hapus}',[App\Http\Controllers\BerkasController::class,'hapus']);
    route::get('/kelolaBerkas/tampil',[App\Http\Controllers\BerkasController::class,'tampil']);
    route::get('/kelolaBerkas/detail/{detail}',[App\Http\Controllers\BerkasController::class,'detail']);
    route::post('/kelolaBerkas/tambah/',[App\Http\Controllers\BerkasController::class,'tambah']);
    route::post('/kelolaAdmin/tambah/',[App\Http\Controllers\userControllers::class,'tambah']);
    route::post('/kelolaAdmin/ubah/{ubah}',[App\Http\Controllers\userControllers::class,'ubah']);
    route::get('/kelolaAdmin/hapus/{hapus}',[App\Http\Controllers\userControllers::class,'hapus']);
    route::get('/kelolaAdmin/reset/{ubah}',[App\Http\Controllers\userControllers::class,'reset']);
    route::get('/kelolaBerkasSiswa/tampil',[App\Http\Controllers\kelolaBerkasSiswaController::class,'tampil']);
    route::get('/kelolaBerkasSiswa/detail/{detail}',[App\Http\Controllers\kelolaBerkasSiswaController::class,'detail']);
    route::post('/kelolaBerkasSiswa/tambah/',[App\Http\Controllers\kelolaBerkasSiswaController::class,'tambah']);
    route::post('/kelolaBerkasSiswa/ubah/{ubah}',[App\Http\Controllers\kelolaBerkasSiswaController::class,'ubah']);
    route::get('/kelolaBerkasSiswa/hapus/{hapus}',[App\Http\Controllers\kelolaBerkasSiswaController::class,'hapus']);
    route::get('/kelolaBerkasSiswa/print',[App\Http\Controllers\kelolaBerkasSiswaController::class,'print']);
    route::get('/kelolaBerkasSiswa/rekap/',[App\Http\Controllers\kelolaBerkasSiswaController::class,'rekap']);
    route::get('/kelolaSaran/print',[App\Http\Controllers\SaranController::class,'print']);
    route::get('/kelolaSaran/hapus/{data}',[App\Http\Controllers\SaranController::class,'hapus']);
    route::get('/kelolaSaran/detail/{detail} ',[App\Http\Controllers\SaranController::class,'detail']);
    
});
route::get('/berkas/download/{ubah}',[App\Http\Controllers\berkasController::class,'download']);
route::get('/form',function(){
    return view('admin.form');
});
route::get('/berkas-data',function(){
    return view('berkas');
});
route::get('/berkas/tampil',[App\Http\Controllers\berkasController::class,'tampil_user']);
Auth::routes(['register'=>false,'reset='>false]);

