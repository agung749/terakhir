<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class kelolaPrestasiController extends Controller
{
   public function show()
   {
        return view('prestasi');
   }
}
