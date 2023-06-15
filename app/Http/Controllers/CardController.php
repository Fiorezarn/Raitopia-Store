<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CardController extends Controller
{
    public function index()
    {
        $products = Product::all();

        $data = [
            'products' => $products,
        ];

        return view('product', $data);
    }

    public function home()
    {
        $products = Product::all();

        $data = [
            'products' => $products,
        ];

        return view('index', $data);
    }

    public function detail($id)
    {
        $products = Product::find($id);
        return view("detailproduct", compact('products'));
    }

    public function filter(Request $request)
    {
        $nama_produk = $request->input('nama_produk');
        $harga_min = $request->input('harga_min');
        $harga_max = $request->input('harga_max');

        $products = Product::query();

        if ($nama_produk) {
            $products->whereRaw("LOWER(nama_produk) LIKE ?", ['%' . strtolower($nama_produk) . '%']);
        }

        if ($harga_min) {
            $products->whereRaw("CAST(harga AS UNSIGNED) >= ?", [$harga_min]);
        }

        if ($harga_max) {
            $products->whereRaw("CAST(harga AS UNSIGNED) <= ?", [$harga_max]);
        }

        $products = $products->get();

        return view('product', compact('products'));
    }
}
