<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function  indexList(Request $request)
    {

        $categoryID = $request->input('cat_id');
        $category = Category::find($categoryID);
        // var_dump($category);
        // exit;

        if (isset($category)) {
            $products = $category->products()
                ->take(20)
                ->get();
        } 
        else {
            $products = Product::all();
        }

        return view('productList', compact('products'));
    }



    public function  indexView(Request $request)
    {

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
