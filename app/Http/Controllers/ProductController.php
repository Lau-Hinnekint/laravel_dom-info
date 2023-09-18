<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function  index() {
        $products = Product::inRandomOrder()
            ->take(20)
            ->get();            

        return view('productList', compact('products'));
    }
}
