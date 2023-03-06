<?php

namespace App\Exports;

use App\Models\pemasukan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;

class penghasilanExport implements FromCollection,WithTitle,WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public $nama,$tahun,$id,$i=0;
    public function map($row): array
    {
        
    }
    public function __construct($tahun,$id,$nama)
    {
        $this->tahun = $tahun;
        $this->id=$id;
        $this->nama=$nama;
    }
    public function collection()
    {
        $user = pemasukan::where('toko_id',$this->id)->where('tahun',$this->tahun)->get();
        return $user;
    }
    public function title(): string
    {
        return $this->nama." ".$this->tahun;   
    }
    public function headings(): array
    {
        return [
            'no','bulan','tahun','pemasukan'
        ];
    }
}
