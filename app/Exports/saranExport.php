<?php

namespace App\Exports;

use App\Models\Saran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class saranExport implements FromCollection , ShouldAutoSize, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function map($saran):array
    {
        
        return [    
            $saran->nama,
            $saran->email,
            $saran->saran,
            $saran->kategori,
            $saran->created_at
        ];
    }
    public function headings(): array
    {
     return [
        'nama',
        'email',
        'saran',
        'kategori',
        'tanggal'
     ];
    }
    public function collection()
    {
        return Saran::all();
    }
}
