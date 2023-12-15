<!DOCTYPE html>
<html>
<head>
    <title>Nota Transaksi</title>
    <style>
        /* Tambahkan styling CSS sesuai kebutuhan Anda */
        body {
            font-family: Arial, sans-serif;
        }
        .nota-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .nota-details {
            margin-bottom: 20px;
        }
        .menu-item {
            margin-bottom: 10px;
        }
        .footer {
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="nota-header">
        <h1>Nota Transaksi</h1>
    </div>
    
    <div class="nota-details">
        <p><strong>Nama Pelanggan:</strong> {{ $detailTransaksi->nama_pelanggan }}</p>
        <p><strong>Nama Karyawan:</strong> {{ $detailTransaksi->user->nama_karyawan }}</p>
        <p><strong>Jumlah Pesanan:</strong> {{ $detailTransaksi->jumlah_pesanan }}</p>
        <p><strong>Metode Pembayaran:</strong> {{ $detailTransaksi->metode_pembayaran }}</p>
        <p><strong>Catatan:</strong> {{ $detailTransaksi->catatan ?? '-' }}</p>
        <p><strong>Total Harga:</strong> Rp {{ number_format($detailTransaksi->total_harga, 0, ',', '.') }}</p>
    </div>
    
    <div class="menu-items">
        <h2>Menu Yang Dipesan</h2>
        @foreach($detailTransaksi->pesanan as $pesanan)
            <div class="menu-item">
                <p><strong>Nama Menu:</strong> {{ $pesanan->menu->nama_menu }}</p>
                <p><strong>Jumlah Pesanan:</strong> {{ $pesanan->jumlah_pesanan }}</p>
                <p><strong>Total Harga:</strong> Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</p>
            </div>
        @endforeach
    </div>

    <div class="footer">
        <p>Tanggal: {{ \Carbon\Carbon::parse($detailTransaksi->created_at)->translatedFormat('j F Y H:i:s') }}</p>
    </div>
</body>
</html>
