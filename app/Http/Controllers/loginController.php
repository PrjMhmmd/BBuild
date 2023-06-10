<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;

class loginController extends Controller
{

    //LOGIN
    public function index_login(){
        return view('login.index', [
            "title" => "Login"
        ]);
    }
    public function authenticate(Request $request){
        $credentials=$request->validate([
            "username"=>'required',
            "password"=>'required'
        ]);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            if(auth()->user()->is_admin != true){
                return redirect()->intended('/');
            }else{
                return redirect()->intended('/admin');
            }
        }
        return back()->with('loginError','Login Gagal');
    }


    //LOGOUT
    public function index_logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');

    }
}
