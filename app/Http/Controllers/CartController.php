<?php

namespace App\Http\Controllers;
use App\Models\Backend\Product;
use App\Models\Pesanan;
use App\Models\User;
use App\Models\PesananDetails;
use Auth;
use Alert;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
    	$product = Product::find($id);

        if (!$product) {
            // Tambahkan logika atau respons jika produk tidak ditemukan
            return redirect()->back()->with('error', 'Produk tidak ditemukan');
        }
    
        return view('users.productdet', compact('product'));
    }

    public function store(Request $request, $id)
    {	
    	$product = Product::where('id', $id)->first();
    	$tanggal = Carbon::now();

    	//cek validasi
    	$cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
    	//simpan ke database pesanan
    	if(empty($cek_pesanan))
    	{
    		$pesanan = new Pesanan;
	    	$pesanan->user_id = Auth::user()->id;
	    	$pesanan->tanggal = $tanggal;
	    	$pesanan->status = 0;
	    	$pesanan->jumlah_harga = 0;
            $pesanan->kode = mt_rand(100, 999);
	    	$pesanan->save();
    	}
    	
    	//simpan ke database pesanan detail
    	$pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();

    	//cek pesanan detail
    	$cek_pesanan_detail = PesananDetails::where('product_id', $product->id)->where('pesanan_id', $pesanan_baru->id)->first();
    	if(empty($cek_pesanan_detail))
    	{
    		$pesanan_detail = new PesananDetails;
	    	$pesanan_detail->product_id = $product->id;
	    	$pesanan_detail->pesanan_id = $pesanan_baru->id;
	    	$pesanan_detail->jumlah = $request->jumlah_pesan;
	    	$pesanan_detail->jumlah_harga = $product->harga*$request->jumlah_pesan;
	    	$pesanan_detail->save();
    	}else 
    	{
    		$pesanan_detail = PesananDetails::where('product_id', $product->id)->where('pesanan_id', $pesanan_baru->id)->first();

    		$pesanan_detail->jumlah = $pesanan_detail->jumlah+$request->jumlah_pesan;

    		//harga sekarang
    		$harga_pesanan_detail_baru = $product->harga*$request->jumlah_pesan;
	    	$pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga+$harga_pesanan_detail_baru;
	    	$pesanan_detail->update();
    	}

    	//jumlah total
    	$pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
    	$pesanan->jumlah_harga = $pesanan->jumlah_harga+$product->harga*$request->jumlah_pesan;
    	$pesanan->update();
        
    	
        return redirect('checkout')->with('success', 'Pesanan Sukses Masuk Keranjang');

    }

    public function checkout()
    {
    $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
    $pesanan_details = [];

    if (!empty($pesanan)) {
        $pesanan_details = PesananDetails::where('pesanan_id', $pesanan->id)->get();
    }

    return view('users.checkout', compact('pesanan', 'pesanan_details'));
    }

    public function delete($id)
    {
        $pesanan_detail = PesananDetails::where('id', $id)->first();

        if (!$pesanan_detail) {
            return redirect()->back()->with('error', 'Pesanan detail tidak ditemukan');
        }

        $pesanan = Pesanan::where('id', $pesanan_detail->pesanan_id)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga - $pesanan_detail->jumlah_harga;
        $pesanan->update();

        $pesanan_detail->delete();

        return redirect('checkout')->with('error', 'Pesanan Sukses Masuk Keranjang');
    }
    public function konfirmasi()
    {
        $user = User::where('id', Auth::user()->id)->first();

        if(empty($user->alamat))
        {
            Alert::error('Identitasi Harap dilengkapi', 'Error');
            return redirect('home');
        }

        if(empty($user->email))
        {
            Alert::error('Identitasi Harap dilengkapi', 'Error');
            return redirect('home');
        }

        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        $pesanan_id = $pesanan->id;
        $pesanan->status = 1;
        $pesanan->update();
        
        session()->forget('pesanan');

        return redirect()->route('users.checkout')->with('success', 'Pesanan Anda telah berhasil!');

    }

}
