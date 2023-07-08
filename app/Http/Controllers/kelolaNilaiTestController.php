<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Jurusan;
use App\Models\test;
use App\Models\Kelas;
use Yajra\DataTables\Facades\DataTables;
class kelolaNilaiTestController extends Controller
{
public function tambah(Request $req) {

}
public function ubah($id,$jurusan,$kelas) {

    $siswa=Siswa::where('id',$id);
    $siswa->update(['kelas'=>$kelas,'jurusan'=>$jurusan]);

}
public function ubahData($id, Request $req) {
$ubah = kelas::where('jurusan',$id)->get();

return $ubah;
}
public function hapus($id) {

}
public function tampil()
{
    $data = Siswa::where('status', 2)->with('test')->get();

    return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('jurusan', function ($row) {
            $opt = "";
            $jurusans = jurusan::get(); // Corrected class name to 'jurusan'
            foreach ($jurusans as $jurus) {
                if ($jurus->id == $row->jurusan) {
                    $select = "selected";
                } else {
                    $select = "";
                }
                $opt .= "<option " . $select . " value='" . $jurus->id . "'>" . $jurus->jurusan . "</option>";
            }
            $nilai = "<select class='form-control jurusan' id='jurusan".$row->id."'  data-id=" . $row->id . ">" . $opt . "</select>";
            return $nilai;
        })
        ->addColumn('kelas', function ($row) {
            if($row->kelas==null){
                $opt= "<option value=''>pilih kelas</option>";
            }
            else{
            $opt="";
            }
            $kelas = Kelas::where('kelas', 'X')->where('jurusan', $row->jurusan)->get();

            foreach ($kelas as $kelases) {

                $jurusan = jurusan::where('id', $kelases->jurusan)->get();
                if ($kelases->id == $row->kelas) {
                    $select = "selected";
                } else {
                    $select = "";
                }
                if ($kelases->posisi == 0) {
                    $kelases->posisi = "";
                }
                $opt .= "<option " . $select . " value='" . $kelases->id . "'>" . $kelases->kelas . ' ' . $kelases->posisi . ' ' . $jurusan[0]->jurusan . "</option>";

            }
             return "<select class='form-control kelas' id='kelas" . $row->id . "' data-id=" . $row->id . ">" . $opt . "</select>";
        })
        ->addColumn('nilai', function ($row) {
            return "<input type='number' class='form form-control' id='" . $row->id . "' value='" . $row->test[0]->nilai . "'>";
        })
        ->rawColumns(['nilai', 'jurusan', 'kelas'])
        ->make(true);
}


}
