<?php

use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\ProductController;
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

// Web Routes
Route::get('/web/index', [WebsiteController::class, 'index'])->name('web-index');
Route::get('/web/shop', [WebsiteController::class, 'shop'])->name('web-shop');
Route::get('/web/master', [WebsiteController::class, 'master'])->name('web-master');
Route::get('/web/checkout', [WebsiteController::class, 'checkout'])->name('web-checkout');
Route::get('/web/cart', [WebsiteController::class, 'cart'])->name('web-cart');

// Cart Routes
Route::get('/web/add-to-cart/{id}', [WebsiteController::class, 'addToCart'])->name('web-add-to-cart');
Route::get('/web/cartdata', [WebsiteController::class, 'showCartData'])->name('web-cart-data');
Route::get('/web/remove-from-cart/{id}', [WebsiteController::class, 'remove'])->name('web-remove-from-cart');



// Admin Panel Routes
Route::get('/admin/master', [WebsiteController::class, 'adminMaster'])->name('admin-master');
Route::get('/admin/index', [WebsiteController::class, 'adminIndexPage'])->name('admin-index');


// Product CRUD  Routes
Route::get("/admin/products/create", [ProductController::class, 'create'])->name("admin-products-create");
Route::post("/admin/products/store", [ProductController::class, 'store'])->name("admin-products-store");
Route::get("/admin/products/destroy/{id}", [ProductController::class, 'destroy'])->name("admin-products-destroy");
Route::get("/admin/products/editform/{id}", [ProductController::class, 'editForm'])->name("admin-products-edit-form");
Route::post("/admin/products/edit/update/{id}", [ProductController::class, 'update'])->name("admin-products-update");






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

