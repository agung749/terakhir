<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Jurusan;
use App\Models\test;
use App\Exports\nilaiExport;
use App\Exports\kelasExport;
use App\Models\Kelas;
use Yajra\DataTables\Facades\DataTables;
use Maatwebsite\Excel\Facades\Excel;
class kelolaNilaiTestController extends Controller
{
public function tambah($tambah,$nilai,$field) {
    $siswa=test::where('siswa_id',$tambah);
    $siswa->update([$field=>$nilai]);
}
public function ubah($id,$jurusan,$kelas) {

    $siswa=Siswa::where('id',$id);
    $nilai_total=$siswa->get('nilai_total');
    $siswa->update(['kelas'=>$kelas,'jurusan'=>$jurusan,'nilai_total'=>($nilai_total[0]->nilai_total+$nilai)]);

}
public function ubahData($id, Request $req) {
$ubah = kelas::where('jurusan',$id)->get();
return $ubah;
}
public function printNilai() {
    return Excel::download(new nilaiExport,'Nilai Test Siswa'.date('Y').'.xlsx');
}
public function printAbsen() {
    return Excel::download(new kelasExport,'Absen Siswa'.date('Y').'.xlsx');
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
                $opt .= "<option " . $select . " value='" . $kelases->id . "'>" . $kelases->kelas.' ' . $jurusan[0]->jurusan .' ' . $kelases->posisi . ' ' ."</option>";

            }
             return "<select class='form-control kelas' id='kelas" . $row->id . "' data-id=" . $row->id . ">" . $opt . "</select>";
        })
        ->addColumn('nilai_btq', function ($row) {
            return "<input type='number' class='form form-control nilai' name='nilai_btq' min='1' max='100' id='" . $row->id . "' value='" . $row->test[0]->nilai_wawancara . "'>";
        })->addColumn('nilai_wawancara', function ($row) {
            return "<input type='number' class='form form-control nilai' name='nilai_wawancara' min='1' max='100' id='" . $row->id . "' value='" . $row->test[0]->nilai_btq . "'>";
        })->addColumn('nilai_diagnostik', function ($row) {
            return "<input type='number' class='form form-control nilai' name='nilai_diagnostik' min='1' max='100' id='" . $row->id . "' value='" . $row->test[0]->nilai_diagnostik . "'>";
        })
        ->rawColumns(['nilai_wawancara','nilai_btq','nilai_diagnostik', 'jurusan', 'kelas'])
        ->make(true);
}


}
