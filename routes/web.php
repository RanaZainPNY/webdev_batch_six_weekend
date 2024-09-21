<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view(view: 'welcome');
});


Route::get('/zaeemhomepage', function () {
    return view('zaeem');
});
