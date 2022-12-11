<?php

use Illuminate\Support\Facades\Route;
use App\Models\Kabupaten;
use App\Models\Berita;
use App\Models\Gallery;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\komentar;
use App\Models\Sekolah;
use App\Models\Staff;
use Illuminate\Http\Request;

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
    $rekomen=Berita::get();
    $beritas = Berita::where('judul',$judul)->with('komentar')->get();
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
 
    
    $judul = str_replace("-"," ",$judul);
    $beritas=staff::get();
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
    $beritas = Berita::where('kategori',$kategori1)->paginate(3);
    return view('profile',['cari'=>$beritas,'judul'=>$judul,'kategori'=>$kategori,]);
    
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
Route::get('berita', function (Request $req) {
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
Route::get('staff', function (Request $req) {
    $kategori=[];
    $staff=[ 'Guru',
    'Caraka',
    'TU',
    'Struktural'];
    for($i=0;$i<=3;$i++){
    $kategori[$i]=  Staff::where('jenis',$staff[$i])->get()->count();
    }
 
    if(isset($req->cari)){
    $cari = Staff::where('judul','like','%'.$req->cari.'%')->paginate(5);
   
    }
    else{
        $cari = Staff::paginate(5);
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
 
    $berita = Berita::where('judul',$judul);
    $like = Berita::where('judul',$judul)->get('suka');
    $berita->update([
        'suka'=>$like[0]->suka+1
    ]);
    return redirect()->back();
   
})->name('suka');
Route::get('/berita/dislike/{judul}', function ($judul) {
    $judul = str_replace("-"," ",$judul);
 
    $berita = Berita::where('judul',$judul);
    $like = Berita::where('judul',$judul)->get('tidak_suka');
    $berita->update([
        'tidak_suka'=>$like[0]->suka+1
    ]);
    return redirect()->back();
})->name('tidak_suka');
Route::post('/komentar/{judul}',function (Request $req,$judul)
{
    $judul = str_replace("-"," ",$judul);
    $berita = Berita::where('judul',$judul)->get('id');
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
Route::get('/prestasi', function () {
    return view('prestasi');
})->name('home');
Route::get('/pendaftaran', function () {
    $kabupatens=Kabupaten::where('province_id','32')->get(['name','id']);
    for($i=0; $i<count($kabupatens);$i++){
        $kabname[]=$kabupatens[$i]->name;
        $kabid[]=$kabupatens[$i]->id;
    }
    
        return view('pendaftaran',['kabname'=>$kabname,'kabid'=>$kabid]);
});

Route::group(['prefix'=>'/admin','middleware'=>'user'],function(){
    route::get('/{admin}',[App\Http\Controllers\adminController::class,'halaman']);
    route::post('/berubah',[App\Http\Controllers\adminController::class,'berubah']);

    route::get('/kelolaPendaftaran/tampil',[App\Http\Controllers\PendaftaranController::class,'tampil']);
    route::get('/kelolaPendaftaran/detail/{detail}',[App\Http\Controllers\PendaftaranController::class,'detail']);
    route::post('/kelolaPendaftaran/tambah/',[App\Http\Controllers\PendaftaranController::class,'tambah']);
    route::post('/kelolaPendaftaran/ubah/{ubah}',[App\Http\Controllers\PendaftaranController::class,'ubah']);
    route::get('/kelolaPendaftaran/hapus/{hapus}',[App\Http\Controllers\PendaftaranController::class,'hapus']);
    route::get('/kelolaPendaftaran/print',[App\Http\Controllers\PendaftaranController::class,'print']);
    route::get('/kelolaPendaftaran/rekap/',[App\Http\Controllers\PendaftaranController::class,'rekap']);
    route::get('/kelolaBerita/tampil',[App\Http\Controllers\BeritaController::class,'tampil']);
    route::get('/kelolaBerita/detail/{detail}',[App\Http\Controllers\BeritaController::class,'detail']);
    route::post('/kelolaBerita/tambah/',[App\Http\Controllers\BeritaController::class,'tambah']);
    route::post('/kelolaBerita/ubah/{ubah}',[App\Http\Controllers\BeritaController::class,'ubah']);
    route::get('/kelolaBerita/hapus/{hapus}',[App\Http\Controllers\BeritaController::class,'hapus']);
    route::get('/kelolaStaff/tampil',[App\Http\Controllers\StaffController::class,'tampil']);
    route::get('/kelolaStaff/detail/{detail}',[App\Http\Controllers\StaffController::class,'detail']);
    route::post('/kelolaStaff/tambah/',[App\Http\Controllers\StaffController::class,'tambah']);
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

    route::post('/kelolaAdmin/tambah/',[App\Http\Controllers\userControllers::class,'tambah']);
    route::post('/kelolaAdmin/ubah/{ubah}',[App\Http\Controllers\userControllers::class,'ubah']);
    route::get('/kelolaAdmin/hapus/{hapus}',[App\Http\Controllers\userControllers::class,'hapus']);
    route::get('/kelolaAdmin/reset/{ubah}',[App\Http\Controllers\userControllers::class,'reset']);
    route::get('/kelolaSaran/print',[App\Http\Controllers\SaranController::class,'print']);
    route::get('/kelolaSaran/hapus/{data}',[App\Http\Controllers\SaranController::class,'hapus']);
    route::get('/kelolaSaran/detail/{detail} ',[App\Http\Controllers\SaranController::class,'detail']);
    
});
route::get('/form',function(){
    return view('admin.form');
});
Auth::routes();

