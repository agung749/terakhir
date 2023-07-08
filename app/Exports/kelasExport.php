<?php

namespace App\Exports;
use App\Exports\nilaiExports;
use App\Models\kelas;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithTitle;
class kelasExport implements WithMultipleSheets,WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function sheets(): array
{
    $kelases = kelas::where('kelas','X')->get();
    $data =  [];
        foreach($kelases as $kelas){
            switch($kelas->jurusan){
                case 1:
                    $kelas->jurusan="MPLB";
                    break;
                case 2:
                    $kelas->jurusan="AKL";
                    break;
                case 3:
                    $kelas->jurusan="Pemasaran";
                    break;
                case 4 :
                    $kelas->jurusan="DKV";
                    break;
                case 5:
                    $kelas->jurusan="TJKT";
                    break;
            }
         $data [$kelas->kelas.' ' . $kelas->jurusan." ".$kelas->posisi] =new nilaiExports($kelas->id);
        }
        return $data;
}
public function title(): string
{
    return "Data Absen Tahun ".date('Y');
}
}
