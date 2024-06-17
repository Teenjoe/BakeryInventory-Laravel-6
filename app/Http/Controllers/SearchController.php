<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product; // Sesuaikan dengan model produk Anda

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $products = collect(); // Default value when no query

        if ($query) {
            $products = Product::where('name', 'LIKE', "%{$query}%")
                               ->orWhere('description', 'LIKE', "%{$query}%")
                               ->get();
        }

        return view('search.index', compact('products', 'query'));
    }
}
