<?php
if (!function_exists('hitungTotalNilaiStok')) {
    function hitungTotalNilaiStok(array $products): int
    {
        $totalNilai = 0;
        foreach ($products as $item) {
            $totalNilai += ($item['harga'] * $item['stok']);
        }
        return $totalNilai;
    }
}

if (!function_exists('isStokKritis')) {
    function isStokKritis(int $stok): bool
    {
        return $stok < 3;
    }
}