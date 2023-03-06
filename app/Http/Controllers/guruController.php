<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class guruController extends Controller
{
    public function halaman($req)
    {
        return $this->$req();
    }
    public function home()
    {
        $user = Auth::user();
        if(Hash::check('12345678',$user->password)==false){
            return view('guru.home');
        }
        else{
          
            return redirect('/guru/isidata');
        }
    }
    public function isiData()
    {
        $user = Auth::user();
        
        $user=Staff::where('email',$user->email)->get();
        return view('guru.isiData',['user'=>$user]);
    }
}
