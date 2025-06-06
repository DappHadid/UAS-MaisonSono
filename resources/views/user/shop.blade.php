



{{-- Ini buat menampilkan produk di halaman shop secara berulang --}}
@foreach ($produk as $item)
    <div>
        <h3>{{ $item->nama_produk }}</h3>
        <p>{{ $item->deskripsi }}</p>
        <p>Harga: Rp{{ number_format($item->harga, 0, ',', '.') }}</p>
        <p>Stok: {{ $item->stok }}</p>
    </div>
@endforeach
