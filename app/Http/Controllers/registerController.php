<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class registerController extends Controller
{
    public function index_register(){
        return view('register.index', [
            "title" => "Register"
        ]);
    }

    public function store(Request $request){
        $validatedData= $request->validate([
            "username"=>'required|min:2|max:100',
            "hp"=>'required|numeric|min:10',
            "email"=>'required|email:dns|unique:users',
            "password"=>'required|min:6|max:255',
        ]);
        $validatedData['password']=bcrypt($validatedData['password']);
        User::create($validatedData);
        return redirect('/login')->with('success', 'Registrasi Berhasil, Silahkan Login');
    }
}
