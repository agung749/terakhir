<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class berkasController extends Controller
{
    public function tampil()
    {
        $data = Berkas::latest()->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('aksi', function ($row) {
                $btn = '<a data-id="' . $row->id . '" class="ubah btn btn-primary btn-sm">Edit</a>&nbsp;&nbsp;<a data-id="' . $row->id . '" class="hapus btn btn-danger btn-sm">Hapus</a>&nbsp;&nbsp;<a href="/berkas/download/' . $row->berkas . '"class=" btn btn-success btn-sm">Download</a>';
                return $btn;
            })
            ->rawColumns(['aksi'])

            ->make(true);
    }
    public function tampil_user()
    {
        $data = berkas::where('status', 'publik')->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('aksi', function ($row) {
                $btn = '<a href="/berkas/download/' . $row->berkas . '"class=" btn btn-success btn-sm">Download</a>';
                return $btn;
            })
            ->rawColumns(['aksi'])

            ->make(true);
    }

    public function download($download)
    {
        $path = public_path('berkas/' . $download);
        return response()->download($path);
    }
    public function detail($detail)
    {
        $data = berkas::where('id', $detail)->get();

        return $data;
    }
    public function tambah(Request $req)
    {

        $req->validate([
            'nama' => 'unique:berkas|required',
            'jenis' => 'required',
            'berkas' => 'required|mimes:pdf,jpg,png,xlsx,xlx',
            'status' => 'required',

        ]);
        $Berkas = new Berkas();
        $foto = "";
        $berkas = "";

        if ($req->file('berkas')) {
            $file = $req->file('berkas');
            $berkas = date('YmdHi') . str_replace(' ', '-', $file->getClientOriginalName());
            $file->move('berkas', $berkas);
        }
        $user = Auth::user()->id;
        $Berkas->create([
            'nama' => $req->nama,
            'jenis' => $req->jenis,
            'berkas' => $berkas,
            'status' => $req->status,
            'akun' => $user
        ]);
        return redirect()->back()->with(['success' => 'data berhasil dimasukan']);
    }

    public function ubah(Request $req, $ubah)
    {
        $user = Auth::user()->id;
        $Berkas = berkas::where('id', $ubah);
        $data = berkas::where('id', $ubah)->get();
        $req->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'berkas' => 'nullable|mimes:jpg,png,xlsx,pdf'
        ]);
        $berkas = $data[0]->berkas;
        if ($req->file('berkas')) {
            $file = $req->file('berkas');
            $berkas = date('YmdHi') . str_replace(' ', '-', str_replace(' ', '-', $file->getClientOriginalName()));
            $file->move('berkas',  $berkas);
        }
        $Berkas->update([
            'nama' => $req->nama,
            'jenis' => $req->jenis,
            'berkas' => $berkas,
            'status' => $req->status,
            'akun' => $user
        ]);
        return redirect('/admin/kelolaberkas')->with(['success' => 'data berhasil diupdate']);
    }
    public function show() {
        return view('berkas');
    }    
    public function hapus($req)
    {
        $data = berkas::where('id', $req);
        $data->delete();
        return redirect('/admin/kelolaberkas')->with(['success' => 'data berhasil dihapus']);
    }
}
