<?php

namespace App\Http\Controllers;
use App\Models\Kategori;
use App\Models\Ruangan;
use App\Models\Jenis;
use App\Models\User;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(){
        return view('home', [
            "user" => User::first(),
            "kategoris" => Kategori::all(),
            "ruangans" => Ruangan::all(),
            "jeniss" => Jenis::all(),
        ]);
    }
}
