<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebsiteController extends Controller
{
    public function index()
    {
        return view('web.index');
    }
    public function cart()
    {

        $cart = session()->get('cart');
        return view(
            'web.cart',
            ['cart' => $cart]
        );
    }



    public function addToCart($id)
    {
        // dump($id);
        // Eloquent ORM
        $product = Product::findOrFail($id);

        // Query Builder
        // $product = DB::table('products')->where('Id', $id);


        // $cart = [
        //     '11' => ['name' => 'abc', 'title' => 'chair', .... , 'quantity': 1],
        //     '12' => ['name' => 'abc', 'title' => 'chair', .... , 'quantity': 2],
        //     '23' => ['name' => 'abc', 'title' => 'chair', .... , 'quantity': 1],
        // ]

        // Session Based Cart
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "sku" => $product->sku,
                "price" => $product->price,
                "description" => $product->description,
                "image" => $product->image,
                "quantity" => 1
            ];
        }
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');

    }

    public function showCartData()
    {
        $cart = session()->get('cart');
        dump($cart);
    }

    public function remove($id)
    {

        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        // session()->flash('success', "Product removed successfully");
        return redirect()->back()->with('success', "Product removed successfully");


    }

    public function shop()
    {

        // Eloquent ORM
        // $product = Product::all();

        // Query Builder
        $products = DB::table('products')->get();


        return view('web.shop', ['products' => $products]);
    }

    public function master()
    {
        return view('web.master');
    }


    public function query(Request $request)
    {
        dd($request);
    }

    public function checkout()
    {
        $cart = session()->get('cart');
        return view('web.checkout', ['cart' => $cart]);

    }
    public function adminMaster()
    {
        return view('admin.master');

    }
    public function adminIndexPage()
    {
        $products = Product::all();

        return view('admin.index', [
            'products' => $products
        ]);

    }


}
