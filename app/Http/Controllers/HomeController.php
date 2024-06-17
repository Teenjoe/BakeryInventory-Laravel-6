<?php

namespace App\Http\Controllers;

use App\Product;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all(); // Ambil semua produk
        $totalProducts = $products->count(); // Hitung total produk
        
        $lowStockThreshold = 5; // Misalnya, stok di bawah 5 dianggap rendah
        $lowStockProducts = $products->where('stock', '<', $lowStockThreshold)->count(); // Hitung produk dengan stok rendah

        return view('home', compact('totalProducts', 'lowStockProducts', 'products')); // Kirim data ke view
    }
    
    
}
