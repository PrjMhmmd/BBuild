<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Jenis;
use App\Models\Produk;
use App\Models\Ruangan;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class adminController extends Controller
{

    //ADMIN HOME
    public function index_admin(){
        if(auth()->guest()){
            abort(403);
        }

        if(auth()->user()->is_admin != true){
            abort(403);
        }
        return view('admin.index',[
            "title"=>"Admin"
        ]);
    }


    //ADMIN PRODUK
    public function admin_produk(){
        return view('admin.adminProduk',[
            "title"=>"Produk",
            "produks"=>Produk::all(),
            "kategoris"=>Kategori::all(),
            "ruangans"=>Ruangan::all(),
            "jeniss"=>Jenis::all()
        ]);
    }
    public function store_produk(Request $request){
        $updateData= $request->validate([
           "nama_barang"=>'required',
           "slug"=>'required',
           "harga_barang"=>'required',
           "jumlah_barang"=>'required',
           "deskripsi_barang"=>'required',
           "kategori_id"=>'required',
           "ruangan_id"=>'required',
           "jenis_id"=>'required',
           'image' => 'image|file|mimes:jpeg,png|max:2048',
       ]);

       if($request->file('image')){
        $updateData['image']=$request->file('image')->store('produk-images');
       }

       Produk::create($updateData);
       return redirect('/admin/Produk')->with('alert', 'Barang ditambahkan');
   }

   public function delete_produk($id){
    Produk::find($id)->delete();
    return redirect('/admin/Produk')->with('alert', 'Barang dihapus');
   }

   public function edit_produk(Produk $produks){
        return view('admin.editProduk',[
            "produks"=>$produks,
            "kategoris"=>Kategori::all(),
            "ruangans"=>Ruangan::all(),
            "jeniss"=>Jenis::all()
        ]);
    }

   public function update_produk(Request $request, Produk $produks){
    $rules=[
        "nama_barang"=>'required',
        "harga_barang"=>'required',
        "jumlah_barang"=>'required',
        "deskripsi_barang"=>'required',
        "kategori_id"=>'required',
        "ruangan_id"=>'required',
        "jenis_id"=>'required',
        'image' => 'image|file|mimes:jpeg,png|max:2048'
    ];
    if($request->slug != $produks->slug){
        $rules['slug']='required';
    }
    $updateData=$request->validate($rules);

    if($request->file('image')){
        $updateData['image']=$request->file('image')->store('produk-images');
       }

    Produk::where("id",$produks->id)->update($updateData);
    return redirect('/admin/Produk')->with('alert', 'Barang berhasil diubah');
   }


    //ADMIN USER
    public function admin_user(){
        return view('admin.adminUser',[
            "title"=>"User",
            "users"=>User::all()
        ]);
    }



    //ADMIN TIPE
    public function admin_tipe(){
        return view('admin.adminTipe',[
            "title"=>"Tipe",
            "kategoris"=>Kategori::all(),
            "ruangans"=>Ruangan::all(),
            "jeniss"=>Jenis::all()
        ]);
    }


    //ADMIN KATEGORI
    public function create_kategori(){
        return view('admin.kategori',[
            "title"=>"Kategori",
        ]);
    }
    public function store_kategori(Request $request){
        $updateData= $request->validate([
           "name"=>'required',
           "slug"=>'required',
       ]);
       Kategori::create($updateData);
       return redirect('/admin/Tipe')->with('alert', 'Kategori ditambahkan');
   }



    //ADMIN JENIS
    public function create_jenis(){
        return view('admin.jenis',[
            "title"=>"Kategori",
        ]);
    }
    public function store_jenis(Request $request){
        $updateData= $request->validate([
            "name"=>'required',
            "slug"=>'required',
       ]);
       Jenis::create($updateData);
       return redirect('/admin/Tipe')->with('alert', 'Jenis ditambahkan');
   }



   //ADMIN RUANGAN
    public function create_ruangan(){
        return view('admin.ruangan',[
            "title"=>"Kategori",
        ]);
    }
    public function store_ruangan(Request $request){
        $updateData= $request->validate([
            "name"=>'required',
            "slug"=>'required',
       ]);
       Ruangan::create($updateData);
       return redirect('/admin/Tipe')->with('alert', 'Ruangan ditambahkan');
   }



}
