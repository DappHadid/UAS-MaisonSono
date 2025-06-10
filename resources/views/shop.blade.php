@extends('layouts.app')

<head>

</head>

<body>
    @section('content')
        <x-navbar />

        <header>
            <div id="carouselHeader" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000" data-bs-wrap="true">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselHeader" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselHeader" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                </div>

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="d-block w-100"
                            style="background: url('{{ asset('images/carousel1.png') }}') no-repeat center center / cover; height: 300px;">
                            <div class="container d-flex flex-column justify-content-center align-items-center text-white"
                                style="height: 100%;">
                                <!-- Optional content -->
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="d-block w-100"
                            style="background: url('{{ asset('images/carousel1.png') }}') no-repeat center center / cover; height: 300px;">
                            <div class="container d-flex flex-column justify-content-center align-items-center text-white"
                                style="height: 100%;">
                                <!-- Optional content -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div
            style="background-color: #DCD7C9; height: 40px; position: fixed; bottom: 0; width: 100%; z-index: 9999; display: flex; align-items: center;">
            <marquee behavior="scroll" direction="left" scrollamount="9"
                style="font-family: 'Segoe UI', sans-serif; 
               font-size: 1.1rem; 
               font-weight: 500; 
               color: #4B3832; 
               letter-spacing: 1px; 
               padding-left: 10px;">
                Maisonsono Parfume &nbsp;&nbsp;•&nbsp;&nbsp; Wewangian elegan untuk setiap hari &nbsp;&nbsp;•&nbsp;&nbsp;
                Lembut, tahan lama, dan berkelas &nbsp;&nbsp;•&nbsp;&nbsp; Temukan wangimu di sini!
            </marquee>
        </div>
        <div id="produk" class="container my-5">
            <h2 class="fw-bold text-center mb-4">Produk Kami</h2>
            <div class="row row-cols-1 row-cols-md-3 g-3">
                @foreach ($produk as $item)
                    <div class="col">
                        <div class="card">
                            <div style="height: 400px; overflow: hidden;">
                                <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top img-fluid"
                                    alt="Gambar Produk">
                            </div>
                            <div class="card-body">
                                <h3 class="card-title text-center mb-3">{{ $item->nama }}</h3>
                                <h5>Rp. {{ number_format($item->harga, 0, ',', '.') }}</h5>
                                <p class="card-text">{{ $item->deskripsi }}</p>
                                <a href="{{ url('/produkDetail?id=' . $item->id) }}" class="btn"
                                    style="border: 1px solid #1f2f23; color: #1f2f23; margin-right: 10px;">Detail</a>
                                <a href="{{ url('/add_to_cart?id=' . $item->id . '&name=' . urlencode($item->nama) . '&price=' . $item->harga) }}"
                                    class="btn text-white" style="background-color: #1f2f23;">
                                    <i class="bi bi-cart-plus" style="padding: 20px;"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="d-flex justify-content-center my-4">
            <button class="px-3 btn btn-light mx-1" style="border: none;">&lt;</button>
            <button class="px-3 btn btn-light mx-1" style="font-weight: bold; ">1</button>
            <button class="px-3 btn btn-light mx-1" style="border: none;">2</button>
            <button class="px-3 btn btn-light mx-1" style="border: none;">3</button>
            <button class="px-3 btn btn-light mx-1" style="border: none;">&gt;</button>
        </div>
        <x-footer />
    @endsection
</body>

</html>
