@extends('layouts.app')

<head>

</head>

<body>
    @section('content')
        <x-navbar />
        <header class="header"
            style="background: url('{{ asset('images/bg2.png') }}') no-repeat center center / cover; position: relative; min-height: 200px;">
            <div class="container flex flex-col items-center justify-center h-full text-white">
                <h1 class="text-4 text-center font-bold font-mono">Find Your Parfume!</h1>
                <div class="mt-4">
                    <input type="text" placeholder="Search..." class="w-1/2 p-2 rounded center text-black">
                </div>
            </div>
        </header>
        <div style="background-color: #DCD7C9; height: 40px;">
            <marquee behavior="" direction="">Ini buat tulisan yang gerak bisa kali ya............................ kali ya</marquee>
        </div>
        
        <div id="produk" class="container my-5">
            <h2 class="fw-bold text-center mb-4">Produk Kami</h2>
            <div class="row row-cols-1 row-cols-md-3 g-3">
                <div class="col">
                    <div class="card">
                        <div style="height: 400px; overflow: hidden;">
                            <img src="{{ asset('images/story1.png') }}" class="card-img-top img-fluid" alt="Produk 1">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title mb-3" style="text-align: center;">Monyet</h3>
                            <h5>Rp. 80000</h5>
                            <p class="card-text">Monyetnya gasuka manjat</p>
                            <a href="{{ url('/produkDetail?id=1') }}" class="btn"
                                style="border: 1px solid #1f2f23; color: #1f2f23; margin-right: 10px;">Detail</a>
                            <a href="./process/add_to_cart.php?id=1&name=Monyet&price=80000" class="btn text-white"
                                style="background-color: #1f2f23;"><i class="bi bi-cart-plus"
                                    style="padding: 20px;"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div style="height: 400px; overflow: hidden;">
                            <img src="{{ asset('images/story2.png') }}" class="card-img-top img-fluid" alt="Produk 1">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title text-center mb-3">Lotso</h3>
                            <h5>Rp. 100000</h5>

                            <p class="card-text">Kalo malem suka jalan sendiri</p>
                            <a href="#" class="btn"
                                style="border: 1px solid #1f2f23; color: #1f2f23; margin-right: 10px;">Detail</a>
                            <a href="./process/add_to_cart.php?id=2&name=Lotso&price=100000" class="btn text-white"
                                style="background-color: #1f2f23;"><i class="bi bi-cart-plus"
                                    style="padding: 20px;"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div style="height: 400px; overflow: hidden;">
                            <img src="{{ asset('images/story3.png') }}" class="card-img-top img-fluid" alt="Produk 1">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title text-center mb-3">Mohair Doll</h3>
                            <h5 style="text-align: left;">Rp. 75000</h5>

                            <p class="card-text" style="text-align: left;">Boneka lucu yang bernama mohair</p>
                            <a href="#" class="btn"
                                style="border: 1px solid #1f2f23; color: #1f2f23; margin-right: 10px;">Detail</a>
                            <a href="./process/add_to_cart.php?id=3&name=mohair&price=75000" class="btn text-white"
                                style="background-color: #1f2f23;"><i class="bi bi-cart-plus"
                                    style="padding: 20px;"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div style="height: 400px; overflow: hidden;">
                            <img src="{{ asset('images/banner1.png') }}" class="card-img-top img-fluid" alt="Produk 1">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title mb-3" style="text-align: center;">Monyet</h3>
                            <h5>Rp. 80000</h5>
                            <p class="card-text">Monyetnya gasuka manjat</p>
                            <a href="#" class="btn"
                                style="border: 1px solid #1f2f23; color: #1f2f23; margin-right: 10px;">Detail</a>
                            <a href="./process/add_to_cart.php?id=1&name=Monyet&price=80000" class="btn text-white"
                                style="background-color: #1f2f23;"><i class="bi bi-cart-plus"
                                    style="padding: 20px;"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div style="height: 400px; overflow: hidden;">
                            <img src="{{ asset('images/banner2.png') }}" class="card-img-top img-fluid" alt="Produk 1">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title text-center mb-3">Lotso</h3>
                            <h5>Rp. 100000</h5>

                            <p class="card-text">Kalo malem suka jalan sendiri</p>
                            <a href="#" class="btn"
                                style="border: 1px solid #1f2f23; color: #1f2f23; margin-right: 10px;">Detail</a>
                            <a href="./process/add_to_cart.php?id=2&name=Lotso&price=100000" class="btn text-white"
                                style="background-color: #1f2f23;"><i class="bi bi-cart-plus"
                                    style="padding: 20px;"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div style="height: 400px; overflow: hidden;">
                            <img src="{{ asset('images/banner3.png') }}" class="card-img-top img-fluid" alt="Produk 1">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title text-center mb-3">Mohair Doll</h3>
                            <h5 style="text-align: left;">Rp. 75000</h5>

                            <p class="card-text" style="text-align: left;">Boneka lucu yang bernama mohair</p>
                            <a href="#" class="btn"
                                style="border: 1px solid #1f2f23; color: #1f2f23; margin-right: 10px;">Detail</a>
                            <a href="./process/add_to_cart.php?id=3&name=mohair&price=75000" class="btn text-white"
                                style="background-color: #1f2f23;"><i class="bi bi-cart-plus"
                                    style="padding: 20px;"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center my-4">
            <button class="px-2">&lt;</button>
            <button class="px-2 font-bold">1</button>
            <button class="px-2">2</button>
            <button class="px-2">3</button>
            <button class="px-2">&gt;</button>
        </div>
        <x-footer />
    @endsection
</body>

</html>