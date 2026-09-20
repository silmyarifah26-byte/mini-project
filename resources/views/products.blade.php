<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Produk - Toko Busana Muslim & Santai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f8fafc;
            color: #334155;
        }
        .container {
            max-width: 1100px;
            margin: 0 auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-top: 0;
            color: #1e293b;
        }
        .badge-total {
            background-color: #e2e8f0;
            padding: 12px 18px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 16px;
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            padding: 12px 14px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }
        th {
            background-color: #0f172a;
            color: #ffffff;
            font-size: 14px;
        }
        /* Logika conditional warna baris stok kritis (< 3) */
        .stok-kritis {
            background-color: #fee2e2; /* Merah muda */
            color: #991b1b;
        }
        .status-badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: bold;
        }
        .status-danger {
            background-color: #ef4444;
            color: #ffffff;
        }
        .status-safe {
            background-color: #10b981;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Daftar Persediaan Toko Busana Muslim & Santai</h2>
        
        <div class="badge-total">
            Total Nilai Aset Gudang: Rp {{ number_format($totalNilaiStok, 0, ',', '.') }}
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID Produk</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Status</th>
                    <th>Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $item)
                    @php
                        $kritis = isStokKritis($item['stok']);
                    @endphp
                    <tr class="{{ $kritis ? 'stok-kritis' : '' }}">
                        <td><strong>{{ $item['id'] }}</strong></td>
                        <td>{{ $item['nama'] }}</td>
                        <td>{{ $item['kategori'] }}</td>
                        <td>Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                        <td><strong>{{ $item['stok'] }}</strong></td>
                        <td>
                            @if ($kritis)
                                <span class="status-badge status-danger">Stok Kritis</span>
                            @else
                                <span class="status-badge status-safe">Aman</span>
                            @endif
                        </td>
                        <td>{{ $item['deskripsi'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>