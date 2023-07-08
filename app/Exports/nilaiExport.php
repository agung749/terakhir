<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;
use App\Models\test;
class nilaiExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $i=1;
    function headings() : array {
        return ["No","Nama","Nilai Wawancara","Nilai BTQ", "Nilai Diagnostik","Total Nilai","Rata-Rata"];
    }
    public function map($row):array
    {

        return [
            $this->i++,
            $row->siswa->nama,
            $row->nilai_wawancara,
            $row->nilai_btq,
            $row->nilai_diagnostik,
          $row->nilai_total,
          $row->nilai_total/3
        ];
    }
    public function collection()  {
        return test::orderByRaw('nilai_total')->get();
    }
    public function title() : string{
        return "Data Nilai Test";
    }
}
