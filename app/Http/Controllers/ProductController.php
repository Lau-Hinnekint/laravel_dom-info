<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function  list(Request $request) {

        $type = $request->input('type');
        // var_dump($type);
        // exit;

        $products = Product::where('product_type', 'LIKE', '%' . $type . '%')
            ->take(20)
            ->get();       
        // var_dump($products);
        // exit;

        return view('productList', compact('products'));
    }



    public function  view(Request $request) {

        $id = $request->input('id');
        // var_dump($id);
        // exit;

        $productView = Product::where('id', $id)
            ->get();  
        // var_dump($productView[0]->product_name);
        // exit;          

        return view('productView', compact('productView'));
    }
}
