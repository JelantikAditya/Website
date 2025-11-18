<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Latihan1Controller;

Route::get('/', function () {
    return view('welcome');
});

route::get('/latihan1', function () {
    return view('latihan1');
});