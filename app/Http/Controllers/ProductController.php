<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductController extends Controller
{

    public function  listProduct(Request $request)
    {

        // PRODUCT LIST //

        // $allProducts = Product::all();
        $categoryID = $request->input('cat_id');                                    // Retrieve the category ID into the request using the GET method
        $category = Category::find($categoryID);                                    // Use the 'find' method of Category model to look for an primary key matching with the value categoryID

        if ($categoryID) {                                                          // If $categoryID is set 
            $products = $category->products()->paginate(6);                         // Create a $products variable retrieving all the product matching with the $category variable and
                                                                                    // paginate them as 6 elements per page
            //SQL REQUEST
            // SELECT 
            // `products`.*, 
            // `category_product`.`category_id` as `pivot_category_id`, 
            // `category_product`.`product_id` as `pivot_product_id` 
            // FROM 
            //     `products` 
            // INNER JOIN 
            //     `category_product` ON `products`.`id` = `category_product`.`product_id` 
            // WHERE 
            //     `category_product`.`category_id` = ? 
            // LIMIT 6 OFFSET 0;

        } else {                                                                    // If $categoryID is not set
            $products = Product::paginate(9);                                       // Then we retrieve all products and paginate them as 9 elements per page

            // SQL REQUEST 
            // SELECT * FROM `products` LIMIT 9 OFFSET 0;
        }


        // FILTER MENU //

        $properties = ['gene_brand', 'proc_type', 'proc_frequency', 'memo_size', 'memo_type', 'stor_primary', 'disp_chipset', 'disp_memory', 'netw_wireless', 'peri_type', 'peri_lang', 'peri_connector', 'scrn_type', 'scrn_size', 'scrn_resolution', 'scrn_response', 'scrn_contrast'];
        $result = [];

        foreach ($properties as $property) {
            $values = $products->flatMap(function ($product) use ($property) {      // flatMap iterates through each product and retrieves the associated value with its key
                return $product->categories->pluck("pivot.$property");
            })
                ->unique()                                                          // remove duplicates data
                ->filter(function ($value) {                                        // remove null or empty values
                    return !is_null($value) && $value !== '';
                })
                ->toArray();                                                        // converts the result to an array

            $result[$property] = $values;
        }

        return view('productList', [
            'categoryID' => $categoryID,
            'products' => $products,
            'result' => $result
        ]);
    }


    public function  detailProduct(Request $request)
    {

        // DB::listen(function ($query) {
        //     dump($query->sql);
        //     dump($query->bindings);
        //     dump($query->time);
        // });

        $productID = $request->input('id');                         // Retrieve the product with his ID given by the HTTP request using the GET method
        // REQUETE SQL //
        // SELECT * FROM `products` WHERE `products`.`id` = ? LIMIT 1;

        $product = Product::with('categories')->find($productID);   // Precharging the data with the "categories" junction depending of the product ID using Eloquent
        // REQUETE SQL //
        // SELECT 
        // `categories`.*, 
        // `category_product`.`product_id` as `pivot_product_id`, 
        // `category_product`.`category_id` as `pivot_category_id`, 
        // [...]
        // `category_product`.`scrn_response` as `pivot_scrn_response`, 
        // `category_product`.`scrn_contrast` as `pivot_scrn_contrast` 
        // FROM `categories` 
        // INNER JOIN `category_product` on `categories`.`id` = `category_product`.`category_id` 
        // WHERE `category_product`.`product_id` in (2)

        $pivotData = $product->categories->pluck('pivot');          // We retrieve the preloaded pivot data and use pluck which will perform a foreach of each pivot relationship of the product
                                                                    // to stored them in the pivotData variable as a collection (better data handling via Blade)
        // foreach ($categories as $category) {
        //     $pivotData[] = $category->pivot;
        // }
        return view('productDetail', compact('product', 'pivotData'));
    }


    public function  filterProduct(Request $request)
    {
        // var_dump($_REQUEST);exit;
        $categoryID = $request->input('category_id');

        if (isset($_REQUEST['ACTION']) && $_REQUEST['ACTION'] === 'FILTRER') {                  // Verify if the ACTION in the request is set as FILTRER
            $query = Product::query();                                                          // Then an Eloquent request is created from de product model

            $filters = [        
                'gene_brand', 'proc_type', 'proc_frequency', 'memo_size', 'memo_type',
                'stor_primary', 'disp_chipset', 'disp_memory', 'netw_wireless',                 // A list of filters is defined
                'peri_type', 'peri_lang', 'peri_connector', 'scrn_type', 'scrn_size',
                'scrn_resolution', 'scrn_response', 'scrn_contrast'
            ];


            foreach ($filters as $filter) {
                $inputValue = $request->input($filter);                                         // For each filter, we retrieve the value associated  with the specific key, the filter name 

                if (!empty($inputValue) && is_array($inputValue)) {                             // If the value is not empty and is an array
                    $query->whereHas('categories', function ($q) use ($filter, $inputValue) {   // A subquery is used with 'whereHas', this allows products to be filtered based on relationships in the pivot table
                        $q->whereIn($filter, $inputValue);                                      // The callback function allows you to specify the conditions of the subquery using 'whereIn' 
                    });                                                                         // filtering the result depending of the value of the filter
                }
            }

            $resultats = $query->paginate(6);                                                   // Told to the request to paginate the result with 6 element per page

        } else if ((isset($_REQUEST['ACTION']) && $_REQUEST['ACTION'] === 'RECHERCHER')) {      // Verify if the ACTION in the request is set as RECHERCHER
            DB::listen(function ($query) {
                dump($query->sql);
                dump($query->bindings);
                dump($query->time);
            });
            $query = Product::query();                                                          // Then an Eloquent request is created from de product model
            $searchValue = $request->input('searchValue');                                      // Retrieve the searchValue and put it in a variable

            $query->where('product_name', 'like', "%$searchValue%");                            // Research every matching product name who include the searchValue

            $resultats = $query->paginate(6);                                                   // Told to the request to paginate the result with 6 element per page

        } 

        return view('productFilter', compact('resultats', 'categoryID'));
    }


    public function  edit(Request $request)
    {


        $data = 'CECI EST UN TEST';


        return view('admin/adminPanel', compact('data'));
    }

    // public function  update (Request $request) {
    //     return view('adminUpdate');
    // }

    // public function  destroy (Request $request) {
    //     return view('adminDestroy');
    // }
}
