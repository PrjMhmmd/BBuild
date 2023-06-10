<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Delivery;
use App\Models\Produk;
use App\Models\User;
use App\Models\Detail_order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //ORDER
    public function showPengiriman(){
        $user = Auth::user();
        $orders = $user->orders()->with('detail_orders.produk')->get();
        $totalHarga = 0;
        $jumlah = 0;

        foreach ($orders as $order) {
            foreach ($order->detail_orders as $detailOrder) {
                $totalHarga += $detailOrder->jumlah * $detailOrder->produk->harga_barang;
            }
        }

        foreach ($orders as $order) {
            foreach ($order->detail_orders as $detailOrder) {
                $jumlah += $detailOrder->jumlah;
            }
        }

        return view('pengiriman', [
            "title" => "Pengiriman",
            "jumlah" => $jumlah,
            "totalHarga" => number_format($totalHarga, 0, ',', '.'),
        ]);
    }

    public function storePengiriman(Request $request)
    {

        $validatedData = $request->validate([
            'metode' => 'required',
            'alamat' => 'required',
            'hp' => 'required',
        ]);

        $delivery = new Delivery();
        $delivery->metode = $validatedData['metode'];
        $delivery->hp = $validatedData['hp'];
        $delivery->alamat = $validatedData['alamat'];
        $delivery->save();

        $orders = Order::where('status', 'pending')->get();

        foreach ($orders as $order) {
            $order->delivery_id = $delivery->id;
            $order->status = "completed";
            $order->save();
        }

        $this->produkJumlah();

        return redirect('/');
    }

    private function produkJumlah()
    {
        $completedOrders = Order::where('status', 'completed')->get();

        foreach ($completedOrders as $order) {
            $detailOrders = $order->detail_orders;

            foreach ($detailOrders as $detailOrder) {
                $produk = $detailOrder->produk;
                $produk->jumlah_barang -= $detailOrder->jumlah;
                $produk->save();
            }

            return redirect('/');
        }
    }

    public function riwayatPemesanan()
    {

        $user = Auth::user();
        $orders = $user->orders()
            ->where('status', 'completed')
            ->with('detail_orders.produk')
            ->get();

        $deliveries = Delivery::with('orders')->get();


        return view('spemesanan', [
            'orders' => $orders,
            'deliveries' => $deliveries,
            "title" => "Pesanan",
        ]);
    }





}

