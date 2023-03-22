<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class BeritaController extends Controller
{ 
    public function suka ($judul) {
        $judul = str_replace("-", " ", $judul);
    
        $berita = Berita::where('judul', 'LIKE', '%' . $judul . '%');
        $like = Berita::where('judul', 'LIKE', '%' . $judul . '%')->get('suka');
        $berita->update([
            'suka' => $like[0]->suka + 1
        ]);
        return redirect()->back();
    }
    public function komentar (Request $req, $judul) {
        $judul = str_replace("-", " ", $judul);
        $berita = Berita::where('judul', 'LIKE', '%' . $judul . '%')->get('id');
        $komentar = new komentar;
        $komentar->create([
            'nama' => $req->nama,
            'komentar' => $req->komentar,
            'berita_id' => $berita[0]->id
        ]);
        return redirect()->back();
    }
    public function tidak_suka($judul) {
        $judul = str_replace("-", " ", $judul);
    
        $berita = Berita::where('judul', $judul);
        $like = Berita::where('judul', 'LIKE', '%' . $judul . '%')->get('tidak_suka');
        $berita->update([
            'tidak_suka' => $like[0]->suka + 1
        ]);
        return redirect()->back();
    }
    public function show(Request $req) {
    $kategori = [];
    for ($i = 1; $i <= 11; $i++) {
        $kategori[$i - 1] = Berita::where('kategori', $i)->get()->count();
    }

    if (isset($req->cari)) {
        $cari = Berita::where('judul', 'like', '%' . $req->cari . '%')->paginate(5);
    } else {
        $cari = Berita::paginate(3);
    }
    return view('daftar-berita', ['cari' => $cari, 'kategori' => $kategori]);
    }
    public function kategori ($kategori1) {
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
    }    
    public function berita($judul)
    {
        $kategori = [];
        for ($i = 1; $i <= 11; $i++) {
            $kategori[$i - 1] = $beritas = Berita::where('kategori', $i)->get()->count();
        }

        $judul = str_replace("-", " ", $judul);
        $rekomen = Berita::latest()->limit('7')->get();
        $beritas = Berita::where('judul', 'LIKE', '%' . $judul . '%')->with('komentar')->get();
        return view('berita', ['berita' => $beritas[0], 'rekomen' => $rekomen, 'kategori' => $kategori]);
    }
    public function tampil()
    {



        $data = Berita::latest()->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('aksi', function ($row) {
                $btn = '<a data-id="' . $row->id . '" class="ubah btn btn-primary btn-sm">Edit</a>&nbsp;&nbsp;<a data-id="' . $row->id . '" class="hapus btn btn-danger btn-sm">Hapus</a>&nbsp;&nbsp;<a href="/berita/' . str_replace(' ', '-', $row->judul) . '"class=" btn btn-success btn-sm">lihat</a>';
                return $btn;
            })
            ->rawColumns(['aksi'])

            ->make(true);
    }
    public function detail($detail)
    {
        $data = Berita::where('id', $detail)->get();

        return $data;
    }
    public function tambah(Request $req)
    {
        $req->validate([
            'judul' => 'unique:berita|required',
            'isi' => 'required',
            'foto' => 'required|mimes:jpg,png',
            'video' => 'nullable|mimes:mp4,mkv'
        ]);
        $berita = new Berita();
        $foto = "";
        $video = "";

        if ($req->file('foto')) {
            $file = $req->file('foto');
            $foto = date('YmdHi') . $file->getClientOriginalName();
            $file->move(('images/berita'),  $foto);
        } else if ($req->file('video')) {
            $file = $req->file('video');
            $video = date('YmdHi') . $file->getClientOriginalName();
            $file->move('videos/berita',  $video);
        }
        $user = Auth::user()->id;
        $berita->create([
            'isi' => $req->isi,
            'judul' => $req->judul,
            'foto' => $foto,
            "kategori" => $req->kategori,
            'user_id' => $user,
            'video' => $video,
            'tidak_suka' => 0,
            'suka' => 0
        ]);
        return redirect()->back()->with(['success' => 'data berhasil dimasukan']);
    }

    public function ubah(Request $req, $ubah)
    {
        $berita = Berita::where('id', $ubah);
        $data = Berita::where('id', $ubah)->get();
        $req->validate([
            'judul' => 'required',
            'isi' => 'required',
            'foto' => 'nullable|mimes:jpg,png',
            'video' => 'nullable|mimes:mp4,mkv'
        ]);
        $foto = $data[0]->foto;
        $video = $data[0]->video;
        if ($req->file('foto')) {
            $file = $req->file('foto');
            $foto = date('YmdHi') . str_replace(' ', '-', $file->getClientOriginalName());
            $file->move(('images/berita'),  $foto);
        } else if ($req->file('video')) {
            $file = $req->file('video');
            $video = date('YmdHi') . str_replace(' ', '-', $file->getClientOriginalName());
            $file->move('videos/berita',  $video);
        }
        $berita->update([
            'isi' => $req->isi,
            'judul' => $req->judul,
            'suka' => 0,
            'video' => $video,
            'foto' => $foto,
            'user_id' => Auth::user()->id,
            "kategori" => $req->kategori,
            'tidak_suka' => 0
        ]);
        return redirect('/admin/kelolaBerita')->with(['success' => 'data berhasil diupdate']);
    }
    public function hapus($req)
    {
        $data = Berita::where('id', $req)->with('komentar');

        if (isset($data->komentar)) {
            $data->komentar->delete();
        }
        $data->delete();
        return redirect('/admin/kelolaBerita')->with(['success' => 'data berhasil dihapus']);
    }
}
