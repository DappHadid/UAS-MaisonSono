@extends('layouts.app')

<body>
    <div>
    <x-sidebar />
    <!-- hero section -->
    <header class="bg-success text-white text-center py-5">
        <div class="container">
            <h1>Maison Sono Perfume</h1>
            <p class="lead">Dive into a world of travel perfumes</p>
            <a href="#products" class="btn btn-light btn-lg">Products</a>
        </div>
    </header>

    <!-- about section -->
    <section id="about" class="py-5">
        <div class="container text-center">
            <h2>About Us</h2>
            <p>Kecap ABC adalah kecap manis yang terbuat dari bahan-bahan pilihan berkualitas tinggi. Dengan rasa yang
                khas dan aroma yang menggugah selera, Kecap ABC telah menjadi pilihan utama keluarga Indonesia dalam
                menyajikan masakan lezat.</p>
        </div>
    </section>

    <!-- tambah product-->
    <section id="contact" class="bg-light py-5">
        <div class="container text-center">
            <h2>Tambah Product</h2>
            <form class="mt-4" method="post" action="{{ route('product.create') }}" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="mb-3">
                    <input type="text" class="form-control" name="name" placeholder="Nama Produk">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="price" placeholder="Harga">
                </div>
                <div class="mb-3">
                    <textarea class="form-control" rows="4" name="description" placeholder="Deskripsi"></textarea>
                </div>
                <div class="mb-3">
                    <input type="file" class="form-control" name="photo" accept="image/*">
                </div>
                <button type="submit" class="btn btn-danger">Unggah</button>
            </form>
    </section>

    <!-- Produk Section -->
    <section id="products" class="bg-light py-5"> 
        <div class="container text-center"> 
            <h2>Produk Unggulan</h2> 
            <div class="row mt-4"> 
                @foreach($produk as $produk) 
                <div class="col-md-4"> 
                    <div class="card"> 
                        @if ($produk->photo) 
                            <img src="{{ asset('storage/' . $produk->photo) }}" 
                            alt="Product Image" class="img-fluid mb-3" 
                            style="max-height: 200px;"> 
                        @endif 
                        <div class="card-body"> 
                            <h5 class="card-title">{{$produk->name}}</h5> 
                            <p class="card-text">{{$produk->description}}</p> 
                            <p class="card-text">{{$produk->price}}</p> 
                        </div> 
                    </div> 
                </div> 
                @endforeach 
            </div> 
        </div> 
    </section>
</div>
</body>
