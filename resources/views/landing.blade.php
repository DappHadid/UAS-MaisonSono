@extends('layouts.app')

<body>
    @section('content')
        <x-navbar />

        {{-- corousel --}}
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner vh-100">
                <div class="carousel-item active position-relative">
                    <img src="{{ asset('images/crs2.jpg') }}" class="d-block w-100 vh-100 object-fit-cover" alt="...">
                    <div class="position-absolute top-50 start-50 translate-middle text-center text-white maison-title">
                        <img id="carousel-big-logo" src="{{ asset('images/Sono_white.png') }}" style="width: 700px;"
                            height="auto" alt="Logo Maison Sono">
                    </div>
                </div>
            </div>
        </div>
        {{-- end corousel --}}

        {{-- Memory Section --}}
        <section id="memory-section" class="bg-success-subtle py-5"
            style="background: url('{{ asset('images/bg1.png') }}') no-repeat center center / cover;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <h1 class="display-1 fw-bold text-white">WHAT<br>MEMORY<br>SMELLS LIKE</h1>
                        <p class="text-white mt-4 text-break lh-lg">
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
                    <h2 class="display-5 fw-bold text-white">EVERY SCENT TELLS A STORY</h2>
                </div>

                {{-- Horizontal scrollable card list --}}
                <div id="storyScroll" class="d-flex overflow-x-auto gap-4 pb-3"
                    style="scrollbar-width: none; -ms-overflow-style: none;">
                    <style>
                        .d-flex::-webkit-scrollbar {
                            display: none;
                        }
                    </style>

                    {{-- Card 1 --}}
                    <div class="card border-0 shadow" style="min-width: 360px; height: 480px; border-radius: 2rem;">
                        <img src="{{ asset('images/Fs_Walking The Aisle.jpg') }}"
                            class="card-img-top h-100 object-fit-cover" alt="...">
                    </div>

                    {{-- Card 2 --}}
                    <div class="card text-white rounded-4 p-4"
                        style="min-width: 360px; height: 480px; background-color: #254331;">
                        <p class="mb-3">
                            Fragrance has the incredible power to evoke memories, boost moods, and make us feel a
                            certain way—instantly. When choosing perfume, not just picking a scent, it’s choosing a
                            feeling, a sense of comfort.
                        </p>
                        <strong>Walking The Aisle — Maison Sono</strong>
                    </div>

                    {{-- Card 3 --}}
                    <div class="card border-15 shadow" style="min-width: 360px; height: 480px; border-radius: 2rem;">
                        <img src="{{ asset('images/FS_Island In The Sun.jpeg') }}"
                            class="card-img-top h-100 object-fit-cover" alt="...">
                    </div>

                    {{-- Card 4 --}}
                    <div class="card  text-white rounded-4 p-4"
                        style="min-width: 360px; height: 480px; background-color: #2e6745;">
                        <p class="mb-3">
                            A fragrance isn’t just something you wear—it’s a memory, a feeling, a story. One spritz can
                            transport you to a rainy afternoon, a blooming garden, or even a moment of love and
                            adventure. ✨
                        </p>
                        <strong>Island In The Sun — Maison Sono</strong>
                    </div>

                    {{-- Card 5 --}}
                    <div class="card border-0 shadow" style="min-width: 360px; height: 480px; border-radius: 2rem;">
                        <img src="{{ asset('images/FS_Sleep On The Floor.jpg') }}"
                            class="card-img-top h-100 object-fit-cover" alt="...">
                    </div>

                    {{-- Card 6 --}}
                    <div class="card text-white rounded-4 p-4"
                        style="min-width: 360px; height: 480px; background-color: #417d59;">
                        <p class="mb-3">
                            They say scents linger longer than memories. This one? This one *stayed* — like pages of a book
                            that never closes. A walk through time and dusk.
                        </p>
                        <strong>Sleep On The Floor — Maison Sono</strong>
                    </div>

                </div>
            </div>
        </section>

        <!-- Section 1: Popular Smels -->
        <section class="py-5" style="background: url('/images/bg1.png') no-repeat center center / cover;">
            <div class="container">
                <h1 class="text-center fw-bold text-white mb-4">POPULAR SMELS</h1>
                <div class="row g-4 justify-content-center">
                    <div class="col-md-3">
                        <div class="card h-100" style="height: 420px;">
                            <img src="/images/La Roslyn.jpeg" class="card-img-top" alt="Product 1"
                                style="height: 200px; object-fit: cover;">
                            <div class="card-body text-center d-flex flex-column justify-content-between">
                                <div>
                                    <p class="fw-bold mb-2">Rp. 59.000</p>
                                    <p class="mb-0">Maison 1000 Parfums – Travel Size – Parfum Wanita – WhiteFlower Elixir
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card h-100" style="height: 420px;">
                            <img src="/images/La Roslyn.jpeg" class="card-img-top" alt="Product 2"
                                style="height: 200px; object-fit: cover;">
                            <div class="card-body text-center d-flex flex-column justify-content-between">
                                <div>
                                    <p class="fw-bold mb-2">Rp. 336.000</p>
                                    <p class="mb-0">Travel Bundling – Discovery Set</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card h-100" style="height: 420px;">
                            <img src="/images/La Roslyn.jpeg" class="card-img-top" alt="Product 3"
                                style="height: 200px; object-fit: cover;">
                            <div class="card-body text-center d-flex flex-column justify-content-between">
                                <div>
                                    <p class="fw-bold mb-2">Rp. 69.000</p>
                                    <p class="mb-0">Capsule Scent 5000 Travel Size Perfume Unisex – Parfum Modern – Travel
                                        Collection</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 2: Partner Cafe Info (FIXED) -->
        <section class="py-5">
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
                        <div class="ratio ratio-4x3 position-relative">
                            <iframe
                                src="https://www.google.com/maps/d/u/0/embed?mid=1PQauJzrXVQZglLebZKM3K2hftxy7C2k&ehbc=2E312F"
                                width="640" height="480"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        {{-- end --}}

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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const scrollContainer = document.getElementById('storyScroll');
            let scrollSpeed = 1;

            function autoScroll() {
                scrollContainer.scrollLeft += scrollSpeed;

                // Loop kembali ke awal jika sudah sampai akhir
                if (scrollContainer.scrollLeft + scrollContainer.offsetWidth >= scrollContainer.scrollWidth) {
                    scrollContainer.scrollLeft = 0;
                }

                requestAnimationFrame(autoScroll);
            }

            autoScroll();
        });
    </script>

</body>
