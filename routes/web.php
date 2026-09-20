<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // Memuat fungsi kalkulasi
    require_once app_path('Support/functions.php');

    // Memuat data array produk toko baju
    $products = require app_path('Support/products.php');

    // Menghitung total nilai persediaan
    $totalNilaiStok = hitungTotalNilaiStok($products);

    return view('products', [
        'products' => $products,
        'totalNilaiStok' => $totalNilaiStok,
    ]);
});