<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    protected function login(Request $req){


        if (Auth::attempt(['email' => $req->email, 'password' => $req->password])) {
            $user = User::where('email',$req->email)->get();
            $staff = Staff::where('email',$req->email)->get();
            if($user[0]->role==3){
                return redirect('/wirausaha/home');
            }
            if($user[0]->role==2){
                return redirect('/guru/home');
            }
            else if($user[0]->role==1){
                return redirect('/admin/home');
            }
            else if($user[0]->role==4 && $staff[0]->jabatan=="Bendahara"){
                return redirect('/bendahara/home');
            }
            else if($user[0]->role==4 ){
                return redirect('/admin/home');
            }
        }
        else{
            return redirect()->back();
        }
    }
}
