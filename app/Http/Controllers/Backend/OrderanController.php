<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderanController extends Controller
{
    public function index()
    {
        # list orderan gunakan variabel untuk menampung seluruh isi
        // $data = Orderan::with()->get();
        return view('admin.backend.orders.index');
    }
}
