<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Gallery;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Sekolah;
use Illuminate\Http\Request;

class kelolaSinglePageController extends Controller
{
    public function berubah(Request $req)
    {
        $isi = '';
        if (isset($req->kecamatan)) {
            $kelurahans = Kelurahan::where('district_id', $req->kecamatan)->get();
            for ($i = 0; $i < count($kelurahans); $i++) {
                $isi .= "<option value='" . $kelurahans[$i]->id . "'>" . $kelurahans[$i]->name . "</option>";
            }
            return $isi;
        } else if (isset($req->kabupaten)) {
            $kelurahans = Kecamatan::where('regency_id', $req->kabupaten)->get();
            for ($i = 0; $i < count($kelurahans); $i++) {
                $isi .= "<option value='" . $kelurahans[$i]->id . "'>" . $kelurahans[$i]->name . "</option>";
            }
            return $isi;
        }
    }
    public function jam()
    {
        date_default_timezone_set('Asia/Jakarta'); //Menyesuaikan waktu dengan tempat kita tinggal
        $timestamp = date('H:i:s'); //Menampilkan Jam Sekarang

        return $timestamp;
    }
    public function form()
    {
        return view('admin.form');
    }
    public function home()
    {
        $beritas = Berita::latest()->paginate(2);
        $sekolah = Sekolah::get();
        $fotos = Gallery::get();
        $kategori = [];
        for ($i = 1; $i <= 11; $i++) {
            $kategori[$i - 1] =  Berita::where('kategori', $i)->get()->count();
        }
        return view('welcome', ['beritas' => $beritas, 'sekolah' => $sekolah[0], 'fotos' => $fotos, 'kategori' => $kategori]);
    }
}
