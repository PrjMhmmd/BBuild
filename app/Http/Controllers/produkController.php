<?php

namespace App\Http\Controllers;

use App\Models\Detail_order;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Ruangan;
use App\Models\Jenis;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class produkController extends Controller
{
    //PRODUK
    public function show(Produk $produk){
        return view('produk', [
            "produk" => $produk,
            "gambar"=>'../img/ruangan.jpg',
            "detail" => Detail_order::all()
        ]);
    }


    //TIPE
    public function index_kategori(Kategori $kategori){
        return view('item', [
            "title"=>"Kategori",
            "gambar"=>'../img/ruangan.jpg',
            "produks" => $kategori->produks,
        ]);
    }

    public function index_ruangan(Ruangan $ruangan){
        return view('item', [
            "title"=>"Ruangan",
            "gambar"=>'../img/ruangan.jpg',
            "produks" => $ruangan->produks,
        ]);
    }

    public function index_jenis(Jenis $jenis){
        return view('item', [
            "title"=>"Jenis",
            "gambar"=>'../img/ruangan.jpg',
            "produks" => $jenis->produks,
        ]);
    }


    //CART
    public function showCart()
    {
        $user = Auth::user();
        $orders = $user->orders()->where('status', 'pending')->with('detail_orders.produk')->get();
        $totalHarga = 0;

        foreach ($orders as $order) {
            foreach ($order->detail_orders as $detailOrder) {
                $totalHarga += $detailOrder->jumlah * $detailOrder->produk->harga_barang;
            }
        }

        return view('cart', [
            "orders" => $orders,
            "gambar"=>'../img/ruangan.jpg',
            "totalHarga" => number_format($totalHarga, 0, ',', '.'),
        ]);
    }


    //ADD CART
    public function addToCart(Request $request)
    {
        $validatedData = $request->validate([
            "produk_id" => 'required',
            "jumlah" => 'required',
        ]);

        $produk = Produk::find($validatedData['produk_id']);
        $user = Auth::user();

        $order = $user->orders()->whereHas('detail_orders', function ($query) use ($validatedData) {
            $query->where('produk_id', $validatedData['produk_id']);
        })->first();

        if ($order) {
            $detailOrder = $order->detail_orders()->where('produk_id', $validatedData['produk_id'])->first();
            $detailOrder->jumlah = $validatedData['jumlah'];
            $detailOrder->save();

            $order->total_harga_barang += ($validatedData['jumlah'] * $produk->harga_barang);
            $order->save();
        } else {

            $order = new Order();
            $order->user_id = $user->id;
            $order->total_harga_barang = $validatedData['jumlah'] * $produk->harga_barang;
            $order->save();

            $detailOrder = new Detail_order([
                'produk_id' => $validatedData['produk_id'],
                'jumlah' => $validatedData['jumlah'],
            ]);
            $order->detail_orders()->save($detailOrder);
        }

        return redirect('/cart')->with('alert', 'Produk berhasil ditambahkan!');

    }

    //REMOVE CART
    public function removeCart($id)
    {
        $cartItem = Detail_order::findOrFail($id);
        $orderId = $cartItem->order_id;
        $cartItem->delete();

        $order = Order::find($orderId);
        if ($order && $order->detail_orders()->count() === 0) {
            $order->delete();
        }

        return redirect('/cart');
    }

    public function redirect(){
        return redirect('/cart/pengiriman');
    }
}
