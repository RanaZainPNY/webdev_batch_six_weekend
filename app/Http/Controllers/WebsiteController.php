<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        $ages = [33, 94, 30, 94, 44];
        return view('webindex', [
            'ages' => $ages
        ]);
    }
    public function query(Request $request)
    {
        dd($request);
    }


}
