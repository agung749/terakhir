<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\jurusan;
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
    if($field!="nilai_diagnostik"){

    $nilai_total=$siswa->get('nilai_total');
    $sebelum =$siswa->get($field);
    $siswa->update(['nilai_total'=>($nilai_total[0]->nilai_total-$sebelum[0]->$field)]);
    $nilai_total=$siswa->get('nilai_total');
    $siswa->update([$field=>$nilai,'nilai_total'=>($nilai_total[0]->nilai_total+$nilai)]);
    }
    else{
        $siswa->update(['nilai_diagnostik'=>$nilai]);
    }
}
public function ubah($id,$jurusan,$Kelas) {

    $siswa=Siswa::where('id',$id);

   dd($siswa->update(['kelas'=>$Kelas,'jurusan'=>$jurusan]));
}
public function ubahData($id, Request $req) {
$ubah = Kelas::where('jurusan',$id)->get();
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
        ->addColumn('Kelas', function ($row) {
            if($row->kelas==null){
                $opt= "<option value=''>pilih Kelas</option>";
            }
            else{
            $opt="";
            }
            $Kelas = Kelas::where('Kelas', 'X')->where('jurusan', $row->jurusan)->get();

            foreach ($Kelas as $Kelases) {

                $jurusan = jurusan::where('id', $Kelases->jurusan)->get();
                if ($Kelases->id == $row->kelas) {
                    $select = "selected";
                } else {
                    $select = "";
                }
                if ($Kelases->posisi == 0) {
                    $Kelases->posisi = "";
                }
                $opt .= "<option " . $select . " value='" . $Kelases->id . "'>" . $Kelases->kelas.' ' . $jurusan[0]->jurusan .' ' . $Kelases->posisi . ' ' ."</option>";

            }
             return "<select class='form-control Kelas' id='Kelas" . $row->id . "' data-id=" . $row->id . ">" . $opt . "</select>";
        })
        ->addColumn('nilai_btq', function ($row) {
            return "<input type='number' class='form form-control nilai' name='nilai_btq' min='1' max='100' id='" . $row->id . "' value='" .  $row->test[0]->nilai_btq  . "'>";
        })->addColumn('nilai_wawancara', function ($row) {
            return "<input type='number' class='form form-control nilai' name='nilai_wawancara' min='1' max='100' id='" . $row->id . "' value='" . $row->test[0]->nilai_wawancara. "'>";
        })->addColumn('nilai_diagnostik', function ($row) {
            return "<textarea type='number' class='form form-control nilai' rows='50' name='nilai_diagnostik'  id='" . $row->id . "' value='" .  $row->test[0]->nilai_diagnostik . "'></textarea>";
        })
        ->rawColumns(['nilai_wawancara','nilai_btq','nilai_diagnostik', 'jurusan', 'Kelas'])
        ->make(true);
}


}
