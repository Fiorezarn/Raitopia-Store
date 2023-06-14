<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CardController extends Controller
{
    public function index()
    {
        $product = Product::all();

        $data = [
            'product' => $product,
        ];

        return view('product', $data);
    }
}
