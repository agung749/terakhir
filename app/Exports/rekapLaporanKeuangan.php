<?php

namespace App\Exports;

use App\Models\data_pembayaran;
use App\Models\data_tunggakan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class rekapLaporanKeuangan implements FromView
{
  
    public function view(): View
    {
        $thn_ajaran = date('Y').'/'.date('Y',strtotime(' +1 year'));
        $pembayaran = data_pembayaran::where('semester',1)->where('semester',1)->orWhere('semester','7')->orWhere('semester','8')->orWhere('semester','9')->get();
     $data=data_tunggakan::where('semester',1)->where('tahun_ajaran',$thn_ajaran)->with('siswa')->get();
     return view('pdf.keuangan',['data'=>$data,'pembayaran'=>$pembayaran]);   
    }
}
