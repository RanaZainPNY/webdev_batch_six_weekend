<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Support\Facades\File;
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


        if ($request->image != "") {
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . "." . $ext; // Unique image name; 839333.jpg

            // save image to products directory
            $image->move(public_path('/uploads/products'), $imageName);

            // save image in the database
            $product->image = $imageName;
            $product->save();
        }

        return redirect()->route('admin-index');

    }

    public function destroy($id)
    {
        // dump($id);
        $product = Product::findOrFail($id);
        if ($product->image != "") {
            // delete associated image file
            File::delete(public_path('/uploads/products/' . $product->image));
        }
        $product->delete();
        return redirect()->route(route: 'admin-index');
    }


    public function editForm($id)
    {
        // dump($id);
        $product = Product::findOrFail($id);
        // dump($product);
        return view('admin.products_edit', ['product' => $product]);

    }
    public function update($id, Request $request)
    {
        // dump($id);
        // dump($request);
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();

        if ($request->image != "") {
            // delete old image
            File::delete(public_path('uploads/products/' . $product->image));
            // Create new image file name
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $ext; // unique Image Name

            //save image to the public directory
            $image->move(public_path('uploads/products/'), $imageName);
            $product->image = $imageName;
            $product->save();
        }

        return redirect()->route(route: 'admin-index');


    }
}
