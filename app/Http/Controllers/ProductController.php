<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Backend\Product;
use App\Models\Cart;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {

        // variabel baru
        $products = Product::all();
        return view('users.product', compact('products'));
    }

}