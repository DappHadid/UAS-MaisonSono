@extends('layouts.app')

<body style="background-color: #DCD7C9">
    <div class="d-flex">
        <x-sidebar />
        <div>
            <header class="text py-5">
                <div class="container">
                    <h1>Products</h1>
                    <a href="{{ route('product.create') }}" class="btn btn-success">Add Products</a>
                    <a href="" class="btn btn-outline-primary">Import</a>
                    <a href="" class="btn btn-outline-danger">Export</a>
                </div>
            </header>

            <section class="py-4">
                <div class="container table-responsive text-center">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">PRODUCT</th>
                                <th scope="col">DESCRIPTION</th>
                                <th scope="col">SIZE</th>
                                <th scope="col">PRICE</th>
                                <th scope="col">DISC</th>
                                <th scope="col">IMAGE</th>
                                <th scope="col">STOCK</th>
                                <th scope="col">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produk as $product)
                                <tr>
                                    {{-- <th scope="row">{{ $product->id }}</th> --}}
                                    <td>{{ $product->nama_produk }}</td>
                                    <td>{{ $product->deskripsi }}</td>
                                    <td>{{ $product->size }}</td>
                                    <td>Rp.{{ number_format($product->harga, 0, ',', '.') }}</td>
                                    <td>{{ $product->diskon }}</td>
                                    <td>{{ $product->gambar }}</td>
                                    <td>{{ $product->stok }}</td>
                                    <td>
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('product.edit', $product->id) }}"
                                            class="btn btn-warning"><i class="bi bi-pencil"></i></a>

                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('product.destroy', $product->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>

                                </tr>
                                @endforeach
                                
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
</body>
