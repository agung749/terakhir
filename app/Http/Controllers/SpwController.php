<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\toko;
use App\Models\pemasukan;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SpwController extends Controller
{
    public function tampil()
    {
        $datas = DB::SELECT('select sum(pemasukan) as penghasilan , toko_id from pemasukan  Where tahun="'.date('Y').'"  group by toko_id');
        ksort($datas);
       
        $bulans =['Januari','Febuari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
        $penghasilan=[];
        foreach($bulans as $bulan){
            $penghasilan[]= Pemasukan::where('bulan',$bulan)->where('tahun',date('Y'))->sum('pemasukan');
        }
        $data=[];
       $i=0;
        foreach($datas as $isi){
            $data[$i]['penghasilan']=$isi->penghasilan;
            $toko = toko::where('id',$isi->toko_id )->with('owner')->get();
            $data[$i]['toko']=$toko[0]->nama;
            $data[$i]['foto']=$toko[0]->foto;

            $data[$i]['pemilik']=$toko[0]->owner[0]->name;
            $i++;
        }
        
    return view('spwBos',['data'=>$data,'penghasilan'=>$penghasilan]);
    }
}
