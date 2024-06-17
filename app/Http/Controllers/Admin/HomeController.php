<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product; 

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all(); // Ambil semua produk
        $totalProducts = $products->count(); // Hitung total produk
        
        $lowStockThreshold = 5; // Misalnya, stok di bawah 5 dianggap rendah
        $lowStockProducts = $products->where('stock', '<', $lowStockThreshold)->count(); // Hitung produk dengan stok rendah

        return view('home', compact('totalProducts', 'lowStockProducts', 'products')); // Kirim data ke view
    }
}


