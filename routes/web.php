<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', [App\Http\Controllers\kelolaSinglePageController::class, 'home'])->name('home');

Route::get('/jam', [App\Http\Controllers\kelolaSinglePageController::class, 'jam']);
route::post('/berubah', [App\Http\Controllers\kelolaSinglePageController::class,'berubah']);
Route::post('/saran', [App\Http\Controllers\SaranController::class, 'tambah']);
Route::post('/komentar/{judul}', [App\Http\Controllers\BeritaController::class,'komentar']);
Route::get('/prestasi',[App\Http\Controllers\kelolaPrestasiController::class,'show']);
route::get('/form', [App\Http\Controllers\kelolaSinglePageController::class,'form']);
Route::get('/pendaftaran', [App\Http\Controllers\PendaftaranController::class,'show']);

/* halaman berkas di user page */
route::get('/berkas-data', [App\Http\Controllers\berkasController::class,'show']);
route::get('/berkas/tampil', [App\Http\Controllers\berkasController::class, 'tampil_user']);
route::get('/berkas/download/{ubah}', [App\Http\Controllers\berkasController::class, 'download']);

/* halaman staff di user page */
Route::get('/staff',[App\Http\Controllers\StaffController::class,'show']);
Route::get('/staff/{judul}', [App\Http\Controllers\StaffController::class, 'staff']);
Route::get('/staff/kategori/{judul}', [App\Http\Controllers\StaffController::class,'kategori']);

/* halaman berita di user page */
Route::get('/berita',[App\Http\Controllers\BeritaController::class,'show']);
Route::get('/berita/{judul}', [App\Http\Controllers\BeritaController::class, 'berita']);
Route::get('/berita/kategori/{judul}', [App\Http\Controllers\BeritaController::class, 'kategori']);
Route::get('/berita/like/{judul}',[App\Http\Controllers\BeritaController::class,'suka']);
Route::get('/berita/dislike/{judul}',[App\Http\Controllers\berkasController::class,'tidak_suka']);

/* halaman spw di user page */
route::get('/spw', [App\Http\Controllers\SpwController::class, 'tampil']);
route::get('/spw/{data}', [App\Http\Controllers\SpwController::class, 'data']);

/* group adminSPW */
Route::group(['prefix' => '/adminSPW', 'middleware' => 'user:adminSPW'], function () {
});

/* group kepalaSekolah */
Route::group(['prefix' => '/kepalaSekolah', 'middleware' => 'user:kepala'], function () {
});

route::get('/user/ubah',[App\Http\Controllers\kelolaUser::class,'show']);
route::post('user/password-ubah', [App\Http\Controllers\kelolaUser::class,'ubahPSWD']);
route::post('/pendaftaran/tambah/', [App\Http\Controllers\PendaftaranController::class, 'tambah']);

/* group wirausaha*/
Route::group(['prefix' => '/wirausaha', 'middleware' => 'user:wirausaha'], function () {
    route::get('/home', function () {
        return view('spw.spwHome');
    });
    route::post('/spwHome/tampil', [App\Http\Controllers\PemasukanController::class, 'tampil2']);
    route::post('/toko/tambah', [App\Http\Controllers\TokoController::class, 'tambah']);
    route::post('/toko/ubah/{tambah}', [App\Http\Controllers\TokoController::class, 'ubah']);
    route::get('/toko/hapus/{tambah}', [App\Http\Controllers\TokoController::class, 'hapus']);
    route::get('/toko/detail/{tambah}', [App\Http\Controllers\TokoController::class, 'detail']);
    route::get('/toko/tampil', [App\Http\Controllers\TokoController::class, 'tampil']);
    route::get('/toko', [App\Http\Controllers\TokoController::class, 'show']);
    route::post('/pemasukan/tambah', [App\Http\Controllers\PemasukanController::class, 'tambah']);
    route::post('/pemasukan/ubah/{tambah}', [App\Http\Controllers\PemasukanController::class, 'ubah']);
    route::get('/pemasukan/hapus/{tambah}', [App\Http\Controllers\PemasukanController::class, 'hapus']);
    route::get('/pemasukan/detail/{tambah}', [App\Http\Controllers\PemasukanController::class, 'detail']);
    route::get('/pemasukan/tampil', [App\Http\Controllers\PemasukanController::class, 'tampil']);
    route::get('/pemasukan/print', [App\Http\Controllers\PemasukanController::class, 'print']);
    route::get('/pemasukan', [App\Http\Controllers\PemasukanController::class, 'show']);
});

Route::group(['prefix' => '/guru', 'middleware' => 'user:guru'], function () {
    route::get('/{admin}', [App\Http\Controllers\guruController::class, 'halaman']);
});

Route::group(['prefix' => '/admin', 'middleware' => 'user:admin'], function () {
    route::get('/{admin}', [App\Http\Controllers\adminController::class, 'halaman']);
    route::post('/berubah', [App\Http\Controllers\adminController::class, 'berubah']);
    route::get('/kelolaPendaftaran/mulai', [App\Http\Controllers\PendaftaranController::class, 'mulai']);
    route::get('/kelolaPendaftaran/berhenti', [App\Http\Controllers\PendaftaranController::class, 'berhenti']);
    route::get('/kelolaPendaftaran/tampil', [App\Http\Controllers\PendaftaranController::class, 'tampil']);
    route::get('/kelolaPendaftaran/detail/{detail}', [App\Http\Controllers\PendaftaranController::class, 'detail']);
    route::post('/kelolaPendaftaran/tambah/', [App\Http\Controllers\PendaftaranController::class, 'tambah']);
    route::post('/kelolaPendaftaran/ubah/{ubah}', [App\Http\Controllers\PendaftaranController::class, 'ubah']);
    route::post('/kelolaPendaftaran/cicil/{cicil}', [App\Http\Controllers\PendaftaranController::class, 'cicil']);
   
    route::get('/kelolaPendaftaran/hapus/{hapus}', [App\Http\Controllers\PendaftaranController::class, 'hapus']);
    route::get('/kelolaPendaftaran/print', [App\Http\Controllers\PendaftaranController::class, 'print']);
    route::get('/kelolaPendaftaran/riwayat/{id}', [App\Http\Controllers\PendaftaranController::class, 'riwayat']);
    route::get('/kelolaPendaftaran/cetakKwitansi/{id}', [App\Http\Controllers\PendaftaranController::class, 'cetakKwitansi']);
    route::get('/kelolaPendaftaran/hapusKwitansi/{id}', [App\Http\Controllers\PendaftaranController::class, 'hapusKwitansi']); 
    route::get('/kelolaPendaftaran/cicilTampil/{id}', [App\Http\Controllers\PendaftaranController::class, 'cicilTampil']);
    route::get('/kelolaPendaftaran/surat/{id}', [App\Http\Controllers\PendaftaranController::class, 'surat']);
    route::get('/kelolaPendaftaran/rekap/', [App\Http\Controllers\PendaftaranController::class, 'rekap']);
    route::post('/kelolaPendaftaran/terima/{terima}', [App\Http\Controllers\PendaftaranController::class, 'terima']);
    route::get('/kelolaBerita/tampil', [App\Http\Controllers\BeritaController::class, 'tampil']);
    route::get('/kelolaBerita/detail/{detail}', [App\Http\Controllers\BeritaController::class, 'detail']);
    route::post('/kelolaBerita/tambah/', [App\Http\Controllers\BeritaController::class, 'tambah']);
    route::post('/kelolaBerita/ubah/{ubah}', [App\Http\Controllers\BeritaController::class, 'ubah']);
    route::get('/kelolaBerita/hapus/{hapus}', [App\Http\Controllers\BeritaController::class, 'hapus']);
    route::get('/kelolaStaff/tampil', [App\Http\Controllers\StaffController::class, 'tampil']);
    route::get('/kelolaStaff/detail/{detail}', [App\Http\Controllers\StaffController::class, 'detail']);
    route::post('/kelolaStaff/tambah/', [App\Http\Controllers\StaffController::class, 'tambah']);
    route::post('/kelolaStaff/import/', [App\Http\Controllers\StaffController::class, 'import']);
    route::post('/kelolaStaff/ubah/{ubah}', [App\Http\Controllers\StaffController::class, 'ubah']);
    route::get('/kelolaStaff/hapus/{hapus}', [App\Http\Controllers\StaffController::class, 'hapus']);
    route::get('/kelolaStaff/print', [App\Http\Controllers\StaffController::class, 'print']);
    route::get('/kelolaStaff/rekap/', [App\Http\Controllers\StaffController::class, 'rekap']);
    route::get('/kelolaSiswa/tampil', [App\Http\Controllers\SiswaController::class, 'tampil']);
    route::get('/kelolaSiswa/detail/{detail}', [App\Http\Controllers\SiswaController::class, 'detail']);
    route::post('/kelolaSiswa/tambah/', [App\Http\Controllers\SiswaController::class, 'tambah']);
    route::post('/kelolaSiswa/ubah/{ubah}', [App\Http\Controllers\SiswaController::class, 'ubah']);
    route::get('/kelolaSiswa/hapus/{hapus}', [App\Http\Controllers\SiswaController::class, 'hapus']);
    route::get('/kelolaSiswa/print', [App\Http\Controllers\SiswaController::class, 'print']);
    route::get('/kelolaSiswa/rekap/', [App\Http\Controllers\SiswaController::class, 'rekap']);
    route::get('/kelolaSekolah/tampil', [App\Http\Controllers\SekolahController::class, 'tampil']);
    route::post('/kelolaSekolah/ubah', [App\Http\Controllers\SekolahController::class, 'ubah']);
    route::get('/kelolaGallery/tampil', [App\Http\Controllers\GalleryController::class, 'tampil']);
    route::get('/kelolaGallery/detail/{detail}', [App\Http\Controllers\GalleryController::class, 'detail']);
    route::post('/kelolaGallery/tambah/', [App\Http\Controllers\GalleryController::class, 'tambah']);
    route::post('/kelolaGallery/ubah/{ubah}', [App\Http\Controllers\GalleryController::class, 'ubah']);
    route::get('/kelolaGallery/hapus/{hapus}', [App\Http\Controllers\GalleryController::class, 'hapus']);
    route::get('/kelolaSaran/tampil', [App\Http\Controllers\SaranController::class, 'tampil']);
    route::get('/kelolaSaran/detail/{detail}', [App\Http\Controllers\SaranController::class, 'detail']);
    route::get('/kelolaAdmin/tampil', [App\Http\Controllers\userControllers::class, 'tampil']);
    route::post('/kelolaBerkas/ubah/{ubah}', [App\Http\Controllers\BerkasController::class, 'ubah']);
    route::get('/kelolaBerkas/hapus/{hapus}', [App\Http\Controllers\BerkasController::class, 'hapus']);
    route::get('/kelolaBerkas/tampil', [App\Http\Controllers\BerkasController::class, 'tampil']);
    route::get('/kelolaBerkas/detail/{detail}', [App\Http\Controllers\BerkasController::class, 'detail']);
    route::post('/kelolaBerkas/tambah/', [App\Http\Controllers\BerkasController::class, 'tambah']);
    route::post('/kelolaAdmin/tambah/', [App\Http\Controllers\userControllers::class, 'tambah']);
    route::post('/kelolaAdmin/ubah/{ubah}', [App\Http\Controllers\userControllers::class, 'ubah']);
    route::get('/kelolaAdmin/hapus/{hapus}', [App\Http\Controllers\userControllers::class, 'hapus']);
    route::get('/kelolaAdmin/reset/{ubah}', [App\Http\Controllers\userControllers::class, 'reset']);
    route::get('/kelolaBerkasSiswa/tampil', [App\Http\Controllers\kelolaBerkasSiswaController::class, 'tampil']);
    route::get('/kelolaBerkasSiswa/detail/{detail}', [App\Http\Controllers\kelolaBerkasSiswaController::class, 'detail']);
    route::post('/kelolaBerkasSiswa/tambah/', [App\Http\Controllers\kelolaBerkasSiswaController::class, 'tambah']);
    route::post('/kelolaBerkasSiswa/ubah/{ubah}', [App\Http\Controllers\kelolaBerkasSiswaController::class, 'ubah']);
    route::get('/kelolaBerkasSiswa/hapus/{hapus}', [App\Http\Controllers\kelolaBerkasSiswaController::class, 'hapus']);
    route::get('/kelolaBerkasSiswa/print', [App\Http\Controllers\kelolaBerkasSiswaController::class, 'print']);
    route::get('/kelolaBerkasSiswa/rekap/', [App\Http\Controllers\kelolaBerkasSiswaController::class, 'rekap']);
    route::get('/kelolaSaran/print', [App\Http\Controllers\SaranController::class, 'print']);
    route::get('/kelolaSaran/hapus/{data}', [App\Http\Controllers\SaranController::class, 'hapus']);
    route::get('/kelolaSaran/detail/{detail} ', [App\Http\Controllers\SaranController::class, 'detail']);
    route::get('/kelolaDataPembayaran/tampil', [App\Http\Controllers\DataPembayaranController::class, 'tampil']);
    route::get('/kelolaDataPembayaran/detail/{detail}', [App\Http\Controllers\DataPembayaranController::class, 'detail']);
    route::post('/kelolaDataPembayaran/tambah/', [App\Http\Controllers\DataPembayaranController::class, 'tambah']);
    route::post('/kelolaDataPembayaran/ubah/{ubah}', [App\Http\Controllers\DataPembayaranController::class, 'ubah']);
    route::get('/kelolaDataPembayaran/hapus/{hapus}', [App\Http\Controllers\DataPembayaranController::class, 'hapus']);
    
});

Auth::routes(['register' => register, 'reset=' > false]);
