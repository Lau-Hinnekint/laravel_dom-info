<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});


Route::get('product-list', [ProductController::class,'listProduct'])->name('productList');
Route::get('product-detail', [ProductController::class,'detailProduct'])->name('productDetail');
Route::post('product-filter', [ProductController::class, 'filterProduct'])->name('productFilter');