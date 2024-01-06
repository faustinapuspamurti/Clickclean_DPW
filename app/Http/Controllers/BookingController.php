<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        return view('users.booking');
    }

    public function create()
    {
        # membuat template create product
        return view('users.booking');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi request dari form 
        $request->validate([
            'nama' => 'required',
            'paket_layanan'=>'required',
            'metode_pembayaran' => 'required',
            'no_hp'=> 'required',
            'alamat' => 'required'
        ], [
            'nama.required' => 'Wajib di isi',
            'paket_layanan.required' => 'Wajib di isi',
            'metode_pembayaran.required' => 'Wajib di isi',
            'no_hp.required' => 'Wajib di isi',
            'alamat.required' => 'Wajib di isi'
        ]);

        # awal query
        
        Booking::create([
            'nama' => $request->nama,
            'paket_layanan' => $request->paket_layanan,
            'metode_pembayaran' => $request->metode_pembayaran,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat
        ]);
        # akhir query

        // Redirect ke halaman sukses atau halaman lainnya
        return redirect()->route('booking')->with('success', 'Booking berhasil disimpan!');
    }
}