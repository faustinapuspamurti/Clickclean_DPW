<?php

namespace App\Http\Controllers;

use App\Models\Backend\Product;
use App\Models\Pesanan;
use App\Models\User;
use App\Models\PesananDetails;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Menampilkan detail produk
    public function index($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan');
        }

        return view('users.productdet', compact('product'));
    }

    // Menambah produk ke dalam keranjang
    public function store(Request $request, $id)
    {
        $product = Product::find($id);
        $tanggal = Carbon::now();

        if (!$product) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan');
        }

        // Cek apakah pesanan sudah ada
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 'unpaid')->first();

        if (empty($pesanan)) {
            $pesanan = new Pesanan;
            $pesanan->user_id = Auth::user()->id;
            $pesanan->tanggal = $tanggal;
            $pesanan->status = 'unpaid';
            $pesanan->jumlah_harga = 0;
            $pesanan->kode = mt_rand(100, 999);
            $pesanan->save();
        }

        // Simpan ke detail pesanan
        $pesanan_detail = PesananDetails::where('product_id', $product->id)
            ->where('pesanan_id', $pesanan->id)
            ->first();

        if (empty($pesanan_detail)) {
            $pesanan_detail = new PesananDetails;
            $pesanan_detail->product_id = $product->id;
            $pesanan_detail->pesanan_id = $pesanan->id;
            $pesanan_detail->jumlah = $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $product->harga * $request->jumlah_pesan;
            $pesanan_detail->save();
        } else {
            $pesanan_detail->jumlah += $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga += $product->harga * $request->jumlah_pesan;
            $pesanan_detail->update();
        }

        // Update jumlah total pesanan
        $pesanan->jumlah_harga += $product->harga * $request->jumlah_pesan;
        $pesanan->update();

        return redirect('checkout')->with('success', 'Produk berhasil ditambahkan ke keranjang');
    }

    // Menampilkan halaman checkout
    public function checkout()
    {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 'unpaid')->first();
        $pesanan_details = [];

        if (!empty($pesanan)) {
            $pesanan_details = PesananDetails::where('pesanan_id', $pesanan->id)->get();
        }

        return view('users.checkout', compact('pesanan', 'pesanan_details'));
    }

    // Menghapus item dari keranjang
    public function delete($id)
    {
        $pesanan_detail = PesananDetails::find($id);

        if (!$pesanan_detail) {
            return redirect()->back()->with('error', 'Item tidak ditemukan');
        }

        $pesanan = Pesanan::find($pesanan_detail->pesanan_id);
        $pesanan->jumlah_harga -= $pesanan_detail->jumlah_harga;
        $pesanan->update();

        $pesanan_detail->delete();

        return redirect('checkout')->with('success', 'Item berhasil dihapus dari keranjang');
    }

    // Mengonfirmasi pesanan
    public function konfirmasi()
    {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 'unpaid')->first();

        if (empty($pesanan)) {
            return redirect('checkout')->with('error', 'Tidak ada pesanan yang dapat dikonfirmasi');
        }

        return redirect('invoice')->with('success', 'Pesanan Anda telah dikonfirmasi');
    }

    // Menampilkan halaman invoice
    public function invoice()
    {
        // Ambil data pesanan terbaru dengan status 'unpaid'
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 'unpaid')->latest()->first();

        if (empty($pesanan)) {
            return redirect('checkout')->with('error', 'Tidak ada pesanan yang dapat ditampilkan');
        }

        $pesanan->status = 'unpaid';
        $pesanan->update();

        // Ambil detail pesanan
        $pesanan_details = PesananDetails::where('pesanan_id', $pesanan->id)->get();

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $pesanan->id . '-' . time(), // Tambahkan timestamp agar unik
                'gross_amount' => $pesanan->jumlah_harga,
            ),
            'customer_details' => array(
                'name' => Auth::user()->name,
            ),
        );
        
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('users.invoice', compact('snapToken', 'pesanan', 'pesanan_details'));
    }

    // Menampilkan halaman invoice setelah pembayaran berhasil
    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $calculated_signature = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        
        if ($calculated_signature !== $request->signature_key) {
            \Log::error('Invalid Signature Key');
            return response()->json(['message' => 'Invalid signature'], 403);
        }
        $order_id_parts = explode('-', $request->order_id);
        $pesanan_id = $order_id_parts[0];
        $pesanan = Pesanan::find($pesanan_id);

        if (!$pesanan) {
            \Log::error('Pesanan not found for order_id: ' . $request->order_id);
            return response()->json(['message' => 'Order not found'], 404);
        }

        if (in_array($request->transaction_status, ['capture', 'settlement'])) {
            $pesanan->status = 'paid';
            $pesanan->update();
            \Log::info('Pesanan ID ' . $pesanan_id . ' status updated to paid');
        }

        return response()->json(['message' => 'Callback processed successfully'], 200);
    }
}
