<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function  indexList(Request $request)
    {

        $categoryID = $request->input('cat_id');
        $category = Category::find($categoryID);

        if (isset($category)) {
            $products = $category->products()
                ->take(20)
                ->get();
        } else {
            $products = Product::all();
        }

        $brands = DB::table('category_product')
            ->where('category_id', $categoryID)
            ->distinct()
            ->pluck('gene_brand');

        $procTypes = DB::table('category_product')
            ->where('category_id', $categoryID)
            ->distinct()
            ->pluck('proc_type');

        $procFrequencies = DB::table('category_product')
            ->where('category_id', $categoryID)
            ->distinct()
            ->pluck('proc_frequency');

        $memorySizes = DB::table('category_product')
            ->where('category_id', $categoryID)
            ->distinct()
            ->pluck('memo_size');

        $memoTypes = DB::table('category_product')
            ->where('category_id', $categoryID)
            ->distinct()
            ->pluck('memo_type');

        $storPrimaries = DB::table('category_product')
            ->where('category_id', $categoryID)
            ->distinct()
            ->pluck('stor_primary');

        $dispChipsets = DB::table('category_product')
            ->where('category_id', $categoryID)
            ->distinct()
            ->pluck('disp_chipset');

        $dispMemories = DB::table('category_product')
            ->where('category_id', $categoryID)
            ->distinct()
            ->pluck('disp_memory');

        $netwWireless = DB::table('category_product')
            ->where('category_id', $categoryID)
            ->distinct()
            ->pluck('netw_wireless');

        return view('productList', [
            'categoryID' => $categoryID,
            'products' => $products,
            'brands' => $brands,
            'procTypes' => $procTypes,
            'procFrequencies' => $procFrequencies,
            'memorySizes' => $memorySizes,
            'memoTypes' => $memoTypes,
            'storPrimaries' => $storPrimaries,
            'dispChipsets' => $dispChipsets,
            'dispMemories' => $dispMemories,
            'netwWireless' => $netwWireless
        ]);
    }

    public function  indexView(Request $request)
    {

        $productID = $request->input('id');
        $product = Product::with('categories')->find($productID);

        $categories = $product->categories;

        foreach ($categories as $category) {
            $pivotData[] = $category->pivot;
        }

        return view('productView', compact('product', 'pivotData'));
    }
}
