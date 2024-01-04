<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        return view('users.booking');
    }

    public function store(Request $request)
    {
        // Validasi data dari form booking
        $validatedData = $request->validate([
            // Atur validasi untuk setiap field
            'nama' => 'required',
            'paket_layanan' => 'required',
            'metode_pembayaran' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        // Simpan data booking ke database
        Booking::create($validatedData);

        // Redirect ke halaman sukses atau halaman lainnya
        return redirect()->route('users.booking')->with('success', 'Booking berhasil disimpan!');
    }
}