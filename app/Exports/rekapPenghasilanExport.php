<?php

namespace App\Exports;

use App\Models\pemasukan;
use App\Models\toko;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class rekapPenghasilanExport implements WithMultipleSheets
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function sheets(): array
    {
        $tahun=pemasukan::select('tahun')->distinct()->get();
        $tokos = toko::where('owner_id',Auth::user()->id)->get();
        $array = [];
        foreach($tokos as $toko){
            foreach($tahun as $tahuns){
               
            if(pemasukan::where('toko_id',$toko->id)->where('tahun',$tahuns->tahun)->exists()){
                $array[]= new penghasilanExport($tahuns->tahun,$toko->id,$toko->nama);
            }
            }
        }
       return $array;
    }
   
}
