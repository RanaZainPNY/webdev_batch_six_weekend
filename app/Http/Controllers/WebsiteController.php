<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        // $ages = [33, 94, 30, 94, 44];
        // return view('webindex', [
        //     'ages' => $ages
        // ]);

        return view('web.index');
    }

    public function shop()
    {
        return view('web.shop');
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
        return view('web.checkout');

    }
    public function adminMaster()
    {
        return view('admin.master');

    }
    public function adminIndexPage()
    {
        $products = Product::all();

        return view('admin.index',[
            'products' => $products
        ]);

    }


}
