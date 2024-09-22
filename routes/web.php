<?php

use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;


Route::get('/', function () {
    return view(view: 'welcome');
});

Route::get('/zaeemhomepage', function () {
    $cities = ["Lahore", 'Karachi', "Multan", 'Narowal'];
    $countries = ['Pakistan', 'United States of America', "England", "Bangladesh"];
    return view('zaeem', [
        'cities_data' => $cities,
        'countries' => $countries
    ]);
    // return "<h1>Hello World</h1>";
});

Route::get('/web/index', [WebsiteController::class, 'index'])->name('web-index');
// Route::get('/web/query', [WebsiteController::class, 'query'])->name('web-index');

Route::post('/web/index/form', function (Request $request) {
    dd($request->name);
})->name('web-index-form');

// route params
Route::get('/web/index/{postId}', function ($id) {
    dump($id);
});

// query params
// Route::get('/web/query', function (Request $request) {
//     dump($request->path());
// });


Route::get('/web/query', function (Request $request) {
    $qeuryParams = $request->query();
    $name = $qeuryParams['name'];
    $email = $qeuryParams['email'];
});



Route::get('/web/products', function () {
    // $products = Product::all();
    // dd($products);

    // $products = DB::statement('SELECT * FROM products');
    $products = DB::select('select * from products');

    dd($products);
});

