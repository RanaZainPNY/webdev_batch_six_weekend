<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function create()
    {
        return view('admin.products_create');
    }

    public function store(Request $request)
    {
        // dump($request);
        $product = new Product();
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();

        return redirect()->route('admin-index');

    }

    public function destroy($id)
    {
        // dump($id);
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin-index');
    }


    public function editForm($id)
    {
        $product = Product::findOrFail($id);
        dump($product);

    }
}
