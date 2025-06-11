@extends('layouts.app')
<style>
    #carousel-big-logo {
        transition: transform 0.6s ease, opacity 0.6s ease;
        transform: translateY(0px) scale(1);
        opacity: 1;
    }

    #carousel-big-logo.shrink-up {
        transform: translateY(-100px) scale(0.5);
        opacity: 0;
    }

    .card-stack-container {
        position: relative;
        height: 300px;
        /* Atur tinggi sesuai kebutuhan */
    }

    .chat-bubble-card {
        position: absolute;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 60%;
        padding: 1rem;
        border-radius: 15px;
        background: rgba(255, 255, 255, 0.9);
        transition: all 0.5s ease;
        opacity: 0;
        color: #000;
        z-index: 0;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Card aktif = tampil jelas */
    .chat-bubble-card.active {
        opacity: 1;
        z-index: 3;
        transform: translateX(-50%) scale(1) translateY(0);
        background: #ffffff;
        filter: none;
    }

    /* Card sebelumnya (1 langkah di belakang) */
    .chat-bubble-card.previous-1 {
        opacity: 0.8;
        z-index: 2;
        transform: translateX(-50%) scale(0.95) translateY(30px);
        filter: blur(1px);
    }

    /* Card 2 langkah di belakang */
    .chat-bubble-card.previous-2 {
        opacity: 0.6;
        z-index: 1;
        transform: translateX(-50%) scale(0.9) translateY(60px);
        filter: blur(2px);
    }

    /* Sisanya disembunyikan */
    .chat-bubble-card:not(.active):not(.previous-1):not(.previous-2) {
        opacity: 0;
        z-index: 0;
    }

    .scroll-text-section {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #ffecd2;
        position: relative;
    }

    .circle-container {
        position: relative;
        width: 400px;
        height: 400px;
    }

    .curved-text {
        position: absolute;
        width: 100%;
        height: 100%;
        animation: rotateTextReverse 20s linear infinite;
        /* Ganti animasi ke reverse */
        transform-origin: center;
    }

    @keyframes rotateTextReverse {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(-360deg);
            /* arah berlawanan jarum jam */
        }
    }

    text {
        font-size: 50px;
        fill: #ffffff;
        font-weight: bold;
        letter-spacing: 3px;
    }

    .center-image {
        width: 300px;
        height: auto;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>

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
                            alt="Logo Maison Sono">
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

        {{-- parfume section --}}
        <section class="scroll-text-section"
            style="background: url('{{ asset('images/bg1.png') }}') no-repeat center center / cover;">
            <div class="circle-container">
                <svg viewBox="0 0 500 500" class="curved-text">
                    <defs>
                        <path id="circlePath" d="M250,250 m-200,0 a200,200 0 1,1 400,0 a200,200 0 1,1 -400,0" />
                    </defs>
                    <text>
                        <textPath href="#circlePath" startOffset="0%" id="animatedText">
                            AND WE ARE LAZY-FRIENDLY • LAZY-FRIENDLY • LAZY-FRIENDLY •
                        </textPath>
                    </text>
                </svg>
                <img src="{{ asset('images/parfume.png') }}" alt="Produk" class="center-image" height="200px">
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




        {{-- <!-- Section 1: Popular Smels -->
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
        </section> --}}

        <!-- Section 2: Partner Cafe Info (FIXED) -->
        <section class="py-5" style="background: white">
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

        {{-- testimonials section --}}
        <section class="py-5 text-white testimonials-section background-image"
            style="background: url('/images/bg1.png') no-repeat center center / cover;">
            <h1 class="text-center fw-bold mb-0">WHAT OUR CUSTOMERS SAY</h1>
            <h3 class="text-center mt-0">Reel feedback from our customers loyal</h3></br></br>
            <div class="card-stack-container">
                <div class="card-stack-container">
                    <div class="chat-bubble-card">Sofia U. <br> Aromanya bener-bener beda dan tahan lama. Favoritku!
                        <br><em>La Roslyn - Maison Sono</em>
                    </div>
                    <div class="chat-bubble-card">Arif N. <br> Wanginya eksklusif, gak pasaran. Paket datang cepat juga.
                        <br><em>Oud Nights - Maison Sono</em>
                    </div>
                    <div class="chat-bubble-card">Rani S. <br> Super puas! Wangi tahan lama banget dan elegan.
                        <br><em>Velvet Noir - Maison Sono</em>
                    </div>
                    <div class="chat-bubble-card">Dimas A. <br> Aromanya kuat tapi gak menusuk. Suka! <br><em>Amber Bloom -
                            Maison Sono</em></div>
                </div>
            </div>
        </section>

        <x-footer />
    @endsection

    <script>

        //navbar 
        window.addEventListener('scroll', function() {
            const bigLogo = document.getElementById('carousel-big-logo');
            const smallLogo = document.getElementById('navbar-logo-small');

            if (window.scrollY > 50) {
                bigLogo.classList.add('shrink-up');
                smallLogo.classList.add('show');
            } else {
                bigLogo.classList.remove('shrink-up');
                smallLogo.classList.remove('show');
            }
        });
        
        // bagian story
        document.addEventListener("DOMContentLoaded", function() {
            const scrollContainer = document.getElementById('storyScroll');
            let scrollSpeed = 1;

            function autoScroll() {
                scrollContainer.scrollLeft += scrollSpeed;
                if (scrollContainer.scrollLeft + scrollContainer.offsetWidth >= scrollContainer.scrollWidth) {
                    scrollContainer.scrollLeft = 0;
                }

                requestAnimationFrame(autoScroll);
            }

            autoScroll();
        });

        // bagian testimonial
        document.addEventListener("DOMContentLoaded", function() {
            const container = document.querySelector(".testimonials-section .card-stack-container");
            const cards = container.querySelectorAll(".chat-bubble-card");

            let currentIndex = 0;

            function updateCards(index) {
                cards.forEach((card, i) => {
                    card.classList.remove("active", "previous-1", "previous-2");

                    if (i === index) {
                        card.classList.add("active");
                    } else if (i === (index - 1 + cards.length) % cards.length) {
                        card.classList.add("previous-1");
                    } else if (i === (index - 2 + cards.length) % cards.length) {
                        card.classList.add("previous-2");
                    }
                });
            }

            function nextCard() {
                currentIndex = (currentIndex + 1) % cards.length;
                updateCards(currentIndex);
            }

            updateCards(currentIndex);
            setInterval(nextCard, 4000);
        });

        window.addEventListener("scroll", () => {
            const textPath = document.getElementById("animatedText");
            const scrollTop = window.scrollY;
            const maxScroll = document.body.scrollHeight - window.innerHeight;

            const offsetPercent = (scrollTop / maxScroll) * 100;
            textPath.setAttribute("startOffset", offsetPercent + "%");
        });
    </script>

</body>