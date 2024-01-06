<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $booking = Booking::query()
        ->get();

    # mengembalikan ke dalam template dengan membawa variabel
    return view('admin.backend.booking.index', compact('booking'));
    }

    public function destroy($id)
    {
        # membuat variabel untuk cek apakah id tersebut ada atau tidak menggunakan find / where by id 
        $booking = Booking::find($id);
        // dd($data);

        # membuat if satu kondisi dimana jika kosong data tersebut akan di kembalikan
        if (empty($booking)) {
            # kembalikan ke halaman list dengan notifikasi with
            return redirect()->route('booking.index')->with('galat', 'data not found');
        }

        # gunakan query delete orm untuk menghapus data pada tabel

        # awal query
        $booking->delete();
        # akhir query

        # kembalikan hasil controller ini ke halaman list booking
        return redirect()->route('booking.index')->with('success', 'Data Berhasil di Hapus');
    }
}