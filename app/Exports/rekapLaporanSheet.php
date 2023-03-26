<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithTitle;

class rekapLaporanSheet implements FromCollection, WithMultipleSheets,WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
public function sheets(): array
{
    return [
        'Rekap Data Siswa'=>new Pendaftaran(),
        'Rekap Data Pembayaran'=>new rekapLaporanKeuangan()
    ];
}
public function title(): string
{
    return "Data Pendaftar Tahun ".date('Y');
}
    public function collection()
    {
        //
    }
}
