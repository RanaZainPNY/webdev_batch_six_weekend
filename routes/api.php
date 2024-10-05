<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Product;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::get('/products', function () {
    $products = Product::all();
    return response()->json(['message' => 'api products called successully', 'products' => $products], 200);
});
