<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class bendaharaController extends Controller
{
    public function halaman($req)
    {
        return $this->$req();
    }
    public function home()
    {
        return view('bendahara.home');
    }
    public function kelolaDataCicilan()
    {
        return view('bendahara.kelolaDataCicilan');
    }
    public function kelolaDataPembayaran()
    {
        return view('bendahara.kelolaDataPembayaran');
    }
    public function kelolaDataPengeluaran()
    {
        return view('bendahara.kelolaDataPengeluaran');
    }
    public function kelolanPengeluaranPemasukan()
    {
        return view('bendahara.kelolaDataPemasukan');

    }
    public function kelolaDataRekap()
    {
        return view('bendahara.kelolaDataRekap');

    }
    public function kelolaMasterGaji()
    {
        return view('bendahara.kelolaMasterGaji');

    }
    public function kelolaDataGaji()
    {
        return view('bendahara.kelolaDataGaji');

    }
}
