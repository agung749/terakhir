<?php

namespace App\Http\Controllers;

use App\Exports\saranExport;
use App\Models\Saran;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class SaranController extends Controller
{
    public function tampil()
    {
        $data = Saran::latest()->get();

            return DataTables::of($data)
                  ->addIndexColumn()
                   ->addColumn('aksi', function($row){
                           $btn = '<a data-id="'.$row->id.'" class="hapus btn btn-danger btn-sm">Hapus</a>';
                         return $btn;

                    })
                    ->rawColumns(['aksi'])
                    ->make(true);
    }
    public function print()
    {
        return Excel::download(new saranExport, 'saran.xlsx');        
    }
    public function tambah(Request $req)
    {
        $req->validate([
            'email'=>'required|email',
            'nama'=>'required',
            'saran'=>'required',
            
        ]);
        $saran = new saran ();
        $saran->create([
            'email'=>$req->email,
            'nama'=>$req->nama,
            'saran'=>$req->saran,
            'kategori'=>$req->kategori
        ]);
        return redirect()->back()->with(['success'=>'saran berhasil dimasukan']);
    }
    public function hapus($data)
    {
        $data = Saran::where('id',$data);
        $data->delete();
        return redirect()->back()->with(['success'=>'data berhasil dihapus']);
    }
 
}
