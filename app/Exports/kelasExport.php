<?php

namespace App\Exports;
use App\Exports\nilaiExports;
use App\Models\Kelas;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithTitle;
class kelasExport implements WithMultipleSheets,WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function sheets(): array
{
    $Kelases = Kelas::where('Kelas','X')->get();
    $data =  [];
        foreach($Kelases as $Kelas){
            switch($Kelas->jurusan){
                case 1:
                    $Kelas->jurusan="MPLB";
                    break;
                case 2:
                    $Kelas->jurusan="AKL";
                    break;
                case 3:
                    $Kelas->jurusan="Pemasaran";
                    break;
                case 4 :
                    $Kelas->jurusan="DKV";
                    break;
                case 5:
                    $Kelas->jurusan="TJKT";
                    break;
            }
         $data [$Kelas->Kelas.' ' . $Kelas->jurusan." ".$Kelas->posisi] =new nilaiExports($Kelas->id);
        }
        return $data;
}
public function title(): string
{
    return "Data Absen Tahun ".date('Y');
}
}
