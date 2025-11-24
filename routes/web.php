<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Latihan1Controller;

Route::get('/', function () {
    return view('pages.dasboard');
});

Route::get('/analitik', function () {
    return view('pages.analitik');
})->name('analitik');

route::get('/latihan1', function () {
    return view('latihan1');
});