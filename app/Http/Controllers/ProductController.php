<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function  listProduct(Request $request)
    {

        $categoryID = $request->input('cat_id');
        $category = Category::find($categoryID);

        $products = $category
            ? $category->products()->get()
            : Product::with('categories')->get();

        $properties = ['gene_brand', 'proc_type', 'proc_frequency', 'memo_size', 'memo_type', 'stor_primary', 'disp_chipset', 'disp_memory', 'netw_wireless', 'peri_type', 'peri_lang', 'peri_connector', 'scrn_type', 'scrn_size', 'scrn_resolution', 'scrn_response', 'scrn_contrast'];
        $result = [];

        foreach ($properties as $property) {
            $values = $products->flatMap(function ($product) use ($property) {
                return $product->categories->pluck("pivot.$property");
            })
            ->unique()
            ->filter(function ($value) {
                return !is_null($value) && $value !== '';
            })
            ->toArray();

            $result[$property] = $values;
        }

        // var_dump($result); exit;



        // if (isset($category)) {
        //     $products = $category->products()->get();

        // $brands = DB::table('category_product')
        //     ->where('category_id', $categoryID)
        //     ->distinct()
        //     ->pluck('gene_brand');

        // $procTypes = DB::table('category_product')
        //     ->where('category_id', $categoryID)
        //     ->distinct()
        //     ->pluck('proc_type');

        // $procFrequencies = DB::table('category_product')
        //     ->where('category_id', $categoryID)
        //     ->distinct()
        //     ->pluck('proc_frequency');

        // $memoSizes = DB::table('category_product')
        //     ->where('category_id', $categoryID)
        //     ->distinct()
        //     ->pluck('memo_size');

        // $memoTypes = DB::table('category_product')
        //     ->where('category_id', $categoryID)
        //     ->distinct()
        //     ->pluck('memo_type');

        // $storPrimaries = DB::table('category_product')
        //     ->where('category_id', $categoryID)
        //     ->distinct()
        //     ->pluck('stor_primary');

        // $dispChipsets = DB::table('category_product')
        //     ->where('category_id', $categoryID)
        //     ->distinct()
        //     ->pluck('disp_chipset');

        // $dispMemories = DB::table('category_product')
        //     ->where('category_id', $categoryID)
        //     ->distinct()
        //     ->pluck('disp_memory');

        // $netwWireless = DB::table('category_product')
        //     ->where('category_id', $categoryID)
        //     ->distinct()
        //     ->pluck('netw_wireless');

        // } else {

        //     return $products = Product::with('categories')->get();

        // $brands = $products->flatMap(function ($product) {
        //     return $product->categories->pluck('pivot.gene_brand');
        // })->unique()->toArray();
        // $procTypes = $products->flatMap(function ($product) {
        //     return $product->categories->pluck('pivot.proc_type');
        // })->unique()->toArray();
        // $procFrequencies = $products->flatMap(function ($product) {
        //     return $product->categories->pluck('pivot.proc_frequency');
        // })->unique()->toArray();
        // $memoSizes = $products->flatMap(function ($product) {
        //     return $product->categories->pluck('pivot.memo_size');
        // })->unique()->toArray();
        // $memoTypes = $products->flatMap(function ($product) {
        //     return $product->categories->pluck('pivot.memo_type');
        // })->unique()->toArray();
        // $storPrimaries = $products->flatMap(function ($product) {
        //     return $product->categories->pluck('pivot.stor_primary');
        // })->unique()->toArray();
        // $dispChipsets = $products->flatMap(function ($product) {
        //     return $product->categories->pluck('pivot.disp_chipset');
        // })->unique()->toArray();
        // $dispMemories = $products->flatMap(function ($product) {
        //     return $product->categories->pluck('pivot.disp_memory');
        // })->unique()->toArray();
        // $netwWireless = $products->flatMap(function ($product) {
        //     return $product->categories->pluck('pivot.netw_wireless');
        // })->unique()->toArray();
        // }

        return view('productList', [
            'categoryID' => $categoryID,
            'products' => $products,
            'result' => $result
            // 'brands' => $brands,
            // 'procTypes' => $procTypes,
            // 'procFrequencies' => $procFrequencies,
            // 'memoSizes' => $memoSizes,
            // 'memoTypes' => $memoTypes,
            // 'storPrimaries' => $storPrimaries,
            // 'dispChipsets' => $dispChipsets,
            // 'dispMemories' => $dispMemories,
            // 'netwWireless' => $netwWireless
        ]);
    }




    public function  detailProduct(Request $request)
    {
        $productID = $request->input('id');
        $product = Product::with('categories')->find($productID);

        $categories = $product->categories;

        foreach ($categories as $category) {
            $pivotData[] = $category->pivot;
        }

        return view('productDetail', compact('product', 'pivotData'));
    }




    public function  filterProduct(Request $request)
    {
        // var_dump($_REQUEST);exit;
        $categoryID = $request->input('category_id');

        if (isset($_REQUEST['ACTION']) && $_REQUEST['ACTION'] === 'FILTRER') {
            $query = Product::query();

            $filters = [
                'gene_brand', 'proc_type', 'proc_frequency', 'memo_size', 'memo_type',
                'stor_primary', 'disp_chipset', 'disp_memory', 'netw_wireless',
                'peri_type', 'peri_lang', 'peri_connector', 'scrn_type', 'scrn_size',
                'scrn_resolution', 'scrn_response', 'scrn_contrast'
            ];
           

            foreach ($filters as $filter) {
                $inputValue = $request->input($filter);
            
                if (!empty($inputValue) && is_array($inputValue)) {
                    $query->whereHas('categories', function ($q) use ($filter, $inputValue) {
                        $q->whereIn($filter, $inputValue);
                    });
                } 
            }

            // if (!empty($request->input('brand')) && is_array($request->input('brand'))) {
            //     $query->whereHas('categories', function ($q) use ($request) {
            //         $q->whereIn('gene_brand', $request->input('brand'));
            //     });
            // }
            // if (!empty($request->input('procType')) && is_array($request->input('procType'))) {
            //     $query->whereHas('categories', function ($q) use ($request) {
            //         $q->whereIn('proc_Type', $request->input('procType'));
            //     });
            // }
            // if (!empty($request->input('procFrequency')) && is_array($request->input('procFrequency'))) {
            //     $query->whereHas('categories', function ($q) use ($request) {
            //         $q->whereIn('proc_Frequency', $request->input('procFrequency'));
            //     });
            // }
            // if (!empty($request->input('memoSize')) && is_array($request->input('memoSize'))) {
            //     $query->whereHas('categories', function ($q) use ($request) {
            //         $q->whereIn('memo_size', $request->input('memoSize'));
            //     });
            // }
            // if (!empty($request->input('memoType')) && is_array($request->input('memoType'))) {
            //     $query->whereHas('categories', function ($q) use ($request) {
            //         $q->whereIn('memo_Type', $request->input('memoType'));
            //     });
            // }
            // if (!empty($request->input('storPrimary')) && is_array($request->input('storPrimary'))) {
            //     $query->whereHas('categories', function ($q) use ($request) {
            //         $q->whereIn('stor_Primary', $request->input('storPrimary'));
            //     });
            // }
            // if (!empty($request->input('dispChipset')) && is_array($request->input('dispChipset'))) {
            //     $query->whereHas('categories', function ($q) use ($request) {
            //         $q->whereIn('disp_Chipset', $request->input('dispChipset'));
            //     });
            // }
            // if (!empty($request->input('dispMemory')) && is_array($request->input('dispMemory'))) {
            //     $query->whereHas('categories', function ($q) use ($request) {
            //         $q->whereIn('disp_Memory', $request->input('dispMemory'));
            //     });
            // }
            // if (!empty($request->input('netwWire')) && is_array($request->input('netwWire'))) {
            //     $query->whereHas('categories', function ($q) use ($request) {
            //         $q->whereIn('netw_wireless', $request->input('netwWire'));
            //     });
            // }
            // if (!empty($request->input('periType')) && is_array($request->input('periType'))) {
            //     $query->whereHas('categories', function ($q) use ($request) {
            //         $q->whereIn('peri_type', $request->input('periType'));
            //     });
            // }
            // if (!empty($request->input('periLang')) && is_array($request->input('periLang'))) {
            //     $query->whereHas('categories', function ($q) use ($request) {
            //         $q->whereIn('peri_lang', $request->input('periLang'));
            //     });
            // }
            // if (!empty($request->input('periConnector')) && is_array($request->input('periConnector'))) {
            //     $query->whereHas('categories', function ($q) use ($request) {
            //         $q->whereIn('peri_connector', $request->input('periConnector'));
            //     });
            // }
            // if (!empty($request->input('scrnType')) && is_array($request->input('scrnType'))) {
            //     $query->whereHas('categories', function ($q) use ($request) {
            //         $q->whereIn('scrn_type', $request->input('scrnType'));
            //     });
            // }
            // if (!empty($request->input('scrnSize')) && is_array($request->input('scrnSize'))) {
            //     $query->whereHas('categories', function ($q) use ($request) {
            //         $q->whereIn('scrn_size', $request->input('scrnSize'));
            //     });
            // }
            // if (!empty($request->input('scrnResolution')) && is_array($request->input('scrnResolution'))) {
            //     $query->whereHas('categories', function ($q) use ($request) {
            //         $q->whereIn('scrn_resolution', $request->input('scrnResolution'));
            //     });
            // }
            // if (!empty($request->input('scrnResponse')) && is_array($request->input('scrnResponse'))) {
            //     $query->whereHas('categories', function ($q) use ($request) {
            //         $q->whereIn('scrn_response', $request->input('scrnResponse'));
            //     });
            // }
            // if (!empty($request->input('scrnContrast')) && is_array($request->input('scrnContrast'))) {
            //     $query->whereHas('categories', function ($q) use ($request) {
            //         $q->whereIn('scrn_contrast', $request->input('scrnContrast'));
            //     });
            // }

            $resultats = $query->get();

        } else if ((isset($_REQUEST['ACTION']) && $_REQUEST['ACTION'] === 'RECHERCHER')) {
            $query = Product::query();
            $searchValue = $request->input('searchValue');

            $query->where('product_name', 'like', "%$searchValue%");

            $resultats = $query->get();
        } else if (empty($resultats)) {
            echo "La recherhe n'a donné aucun résultat !";
        }

        return view('productFilter', compact('resultats', 'categoryID'));
    }
}
