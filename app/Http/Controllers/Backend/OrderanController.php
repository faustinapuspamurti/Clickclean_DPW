<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class OrderanController extends Controller
{
    public function index()
    {
        $pesanans = Pesanan::all(); // Sesuaikan dengan logika atau filter yang dibutuhkan

        return view('admin.backend.orders.index', compact('pesanans'));
    }

    public function destroy($id)
    {
        # membuat variabel untuk cek apakah id tersebut ada atau tidak menggunakan find / where by id 
        $pesanans = Pesanan::find($id);
        // dd($data);

        # membuat if satu kondisi dimana jika kosong data tersebut akan di kembalikan
        if (empty($pesanans)) {
            # kembalikan ke halaman list dengan notifikasi with
            return redirect()->route('orders.index')->with('galat', 'data not found');
        }

        # gunakan query delete orm untuk menghapus data pada tabel

        # awal query
        $pesanans->delete();
        # akhir query

        # kembalikan hasil controller ini ke halaman list booking
        return redirect()->route('orders.index')->with('success', 'Data Berhasil di Hapus');
    }
}