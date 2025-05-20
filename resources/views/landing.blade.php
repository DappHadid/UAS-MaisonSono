@extends('layouts.app')

<head>

</head>

<body>
    @section('content')
        <x-navbar />

        {{-- corousel --}}
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner vh-100">
                <div class="carousel-item active position-relative">
                    <img src="{{ asset('images/banner1.png') }}" class="d-block w-100 vh-100 object-fit-cover" alt="...">
                    <div class="position-absolute top-50 start-50 translate-middle text-center text-white maison-title">
                        <h1 class="display-1 fw-bold">MAISON SONO</h1>
                    </div>
                </div>
            </div>
        </div>
        {{-- end corousel --}}

        {{-- Memory Section --}}
        <section class="bg-success-subtle py-5"
            style="background: url('{{ asset('images/bg1.png') }}') no-repeat center center / cover;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <h1 class="display-1 fw-bold text-white">WHAT<br>MEMORY<br>SMELLS LIKE</h1>
                        <p class="text-white mt-4 text-break lh-lg" style="max-width: 600px;">
                            No, darling, I’m not in the mood for those sugary florals or citrus bursts... I used to
                            likethem, sure, when I didn’t know better.
                            But today, give me the usual—Maison Sono, the one with the midnight bottle...
                            <br><br>
                            And wait, what’s that smoky trace on your wrist? Oud? Leather? Mmm, that’s dangerous. I’ll take
                            the one that smells like late-night jazz and velvet. Oh, and that dark green one—what is that?
                            Patchouli-fig? Gosh, it’s deep! And is that vanilla or is it... incense? Feels like memory.
                            Can I bring the amber one too? Just in case the night asks for something louder.
                        </p>
                    </div>
                </div>
            </div>
        </section>


        {{-- OUR STORY Section --}}
        <section class="py-5" style="background: url('{{ asset('images/bg1.png') }}') no-repeat center center / cover;">
            <div class="container">
                {{-- Judul Our Story --}}
                <div class="mb-5 text-center">
                    <h2 class="display-5 fw-bold text-white">OUR STORY</h2>
                </div>

                {{-- Horizontal scrollable card list --}}
                <div class="d-flex overflow-x-auto gap-4 pb-3" style="scrollbar-width: none; -ms-overflow-style: none;">
                    <style>
                        .d-flex::-webkit-scrollbar {
                            display: none;
                        }
                    </style>

                    {{-- Card 1 --}}
                    <div class="card border-0 shadow" style="min-width: 360px; height: 480px;">
                        <img src="{{ asset('images/story1.png') }}" class="card-img-top h-100 object-fit-cover"
                            alt="...">
                    </div>

                    {{-- Card 2 --}}
                    <div class="card bg-success text-white rounded-4 p-4" style="min-width: 360px; height: 480px;">
                        <p class="mb-3">
                            Fragrance has the incredible power to evoke memories, boost moods, and make us feel a
                            certain way—instantly. When choosing perfume, not just picking a scent, it’s choosing a
                            feeling, a sense of comfort.
                        </p>
                        <strong>Walking The Aisle — Maison Sono</strong>
                    </div>

                    {{-- Card 3 --}}
                    <div class="card border-15 shadow" style="min-width: 360px; height: 480px;">
                        <img src="{{ asset('images/story2.png') }}" class="card-img-top h-100 object-fit-cover"
                            alt="...">
                    </div>

                    {{-- Card 4 --}}
                    <div class="card bg-success text-white rounded-4 p-4" style="min-width: 360px; height: 480px;">
                        <p class="mb-3">
                            A fragrance isn’t just something you wear—it’s a memory, a feeling, a story. One spritz can
                            transport you to a rainy afternoon, a blooming garden, or even a moment of love and
                            adventure. ✨
                        </p>
                        <strong>Island In The Sun — Maison Sono</strong>
                    </div>

                    {{-- Card 5 --}}
                    <div class="card border-0 shadow" style="min-width: 360px; height: 480px;">
                        <img src="{{ asset('images/story3.png') }}" class="card-img-top h-100 object-fit-cover"
                            alt="...">
                    </div>

                    {{-- Card 6 --}}
                    <div class="card bg-success text-white rounded-4 p-4" style="min-width: 360px; height: 480px;">
                        <p class="mb-3">
                            They say scents linger longer than memories. This one? This one *stayed* — like pages of a book
                            that never closes. A walk through time and dusk.
                        </p>
                        <strong>Midnight Library — Maison Sono</strong>
                    </div>

                </div>
            </div>
        </section>

        <!-- Section 1: Popular Smels -->
        <section class="py-5" style="background: url('/images/bg1.png') no-repeat center center / cover;">
            <div class="container">
                <h2 class="text-center fw-bold text-white mb-4">POPULAR SMELS</h2>
                <div class="row g-4 justify-content-center">
                    <div class="col-md-3">
                        <div class="card">
                            <img src="/images/product1.png" class="card-img-top" alt="Product 1"
                                style="height: 200px; object-fit: cover;">
                            <div class="card-body text-center">
                                <p class="fw-bold">Rp. 59.000</p>
                                <p class="mb-0">Maison 1000 Parfums – Travel Size – Parfum Wanita – WhiteFlower Elixir</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="/images/product2.png" class="card-img-top" alt="Product 2"
                                style="height: 200px; object-fit: cover;">
                            <div class="card-body text-center">
                                <p class="fw-bold">Rp. 336.000</p>
                                <p class="mb-0">Travel Bundling – Discovery Set</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="/images/product3.png" class="card-img-top" alt="Product 3"
                                style="height: 200px; object-fit: cover;">
                            <div class="card-body text-center">
                                <p class="fw-bold">Rp. 69.000</p>
                                <p class="mb-0">Capsule Scent 5000 Travel Size Perfume Unisex – Parfum Modern – Travel
                                    Collection</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 2: Partner Cafe Info (FIXED) -->
        <section class="py-5 bg-white">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <div class="d-flex align-items-start flex-column gap-3">
                            <img src="/images/logo1.png" alt="SOMO Logo"
                                style="width: 50px; height: 50px; object-fit: contain;">
                            <h3 class="fw-bold">TRUST YOUR TASTE.</h3>
                            <h3 class="fw-bold">VISIT ONE OF OUR PARTNER CAFE</h3>
                            <a href="#" class="text-dark fw-bold">Where to find us? →</a>
                        </div>
                    </div>

                    <!-- Kanan: Google Maps Embed -->
                    <div class="col-lg-6">
                        <div class="ratio ratio-4x3">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253686.56925004224!2d106.66470108330058!3d-6.229386698166084!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f1571f2d48ef%3A0x301576d14feb9d0!2sJakarta!5e0!3m2!1sen!2sid!4v1715600000000!5m2!1sen!2sid"
                                width="600" height="450" style="border:0; border-radius: 20px;" allowfullscreen=""
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 3: Customer Feedback with stack effect -->
        <section class="py-5 text-white" style="background: url('/images/bg1.png') no-repeat center center / cover;">
            <div class="container">
                <h2 class="text-center fw-bold">What our Customers Say</h2>
                <p class="text-center">Real Feedback from our loyal fans</p>
                <div class="d-flex justify-content-center mt-4">
                    <div class="card-stack" style="width: 90%; max-width: 500px;">
                        <div class="card p-4 shadow text-dark">
                            <div class="d-flex align-items-center mb-3">
                                <!-- Replaced initials box with actual image -->
                                <img src="/images/profile-fa.png" alt="Fa's photo"
                                    style="width: 40px; height: 40px; object-fit: cover; border-radius: 8px;"
                                    class="me-3">
                                <strong>“The Fragrances transport me to another world” - Fa</strong>
                            </div>
                            <p class="text-muted small mb-0">Dior Sausage</p>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>


        <x-footer />
    @endsection


</body>
