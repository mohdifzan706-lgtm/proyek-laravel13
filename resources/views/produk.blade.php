<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Produk</title>
    <style>
        body { font-family: sans-serif; padding: 2rem; background: #f8fafc; }
        .card { background: white; padding: 1.5rem; border-radius: 8px; max-width: 500px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-bottom: 1.5rem; }
        input { width: 100%; padding: 8px; margin: 6px 0 12px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        button { background: #2563eb; color: white; border: none; padding: 10px 15px; border-radius: 4px; cursor: pointer; }
        button:hover { background: #1d4ed8; }
        ul { padding-left: 1.2rem; }
        li { margin-bottom: 0.5rem; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Tambah Produk Baru</h2>
        <form action="{{ route('produk.store') }}" method="POST">
            @csrf
            <label>Nama Produk:</label>
            <input type="text" name="nama" required placeholder="Contoh: Monitor LED">

            <label>Harga (Rp):</label>
            <input type="number" name="harga" required placeholder="Contoh: 1500000">

            <button type="submit">Simpan ke Database</button>
        </form>
    </div>

    <div class="card">
        <h2>Daftar Produk di Database</h2>
        <ul>
            @forelse($daftarProduk as $item)
                <li>
                    <strong>{{ $item->nama }}</strong> - Rp {{ number_format($item->harga, 0, ',', '.') }}
                </li>
            @empty
                <p>Belum ada produk tersimpan.</p>
            @endforelse
        </ul>
    </div>
</body>
</html>