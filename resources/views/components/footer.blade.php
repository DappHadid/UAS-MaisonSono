<footer class="text-white"
    style="background: url('{{ asset('images/bg2.png') }}') no-repeat center center / cover; position: relative; min-height: 300px;">
    <div class="container py-5">
        <div class="row">
            {{-- Kolom Newsletter --}}
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold">Enjoy SONO exclusive offers</h5>
                <p class="small">Stay up-to-date with our latest news,<br> updates and promotions</p>
                <form class="d-flex" role="search">
                    <input type="email" class="form-control me-2 bg-light" placeholder="Your email">
                    <button class="btn btn-light fw-bold" type="submit">Subscribe</button>
                </form>
                <div class="mt-4">
                    <img src="{{ asset('images/logo1.png') }}" alt="Maison Sono" width="100">
                </div>
            </div>

            {{-- Bungkus kolom navigasi dalam satu row dan geser ke kanan --}}
            <div class="col-md-8 d-flex justify-content-end flex-wrap">
                <div class="me-5 mb-4">
                    <h5 class="fw-bold border-bottom border-light pb-1">Explore</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white text-decoration-none">Discover</a></li>
                    </ul>
                </div>

                <div class="me-5 mb-4">
                    <h5 class="fw-bold border-bottom border-light pb-1">Shop</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white text-decoration-none">Shopee</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Tokopedia</a></li>
                    </ul>
                </div>

                <div class="mb-4">
                    <h5 class="fw-bold border-bottom border-light pb-1">Company</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white text-decoration-none">About</a></li>
                        <li><a href="{{ route('career') }}" class="text-white text-decoration-none" >Career</a></li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="d-flex justify-content-between align-items-center border-top border-secondary pt-3">
            <p class="mb-0">© 2025 Maisonsono All rights reserved.</p>
        </div>
    </div>

    {{-- WhatsApp Floating Icon --}}
    <a href="https://wa.me/6281285676030" target="_blank" style="position: absolute; bottom: 20px; right: 20px;">
        <img src="{{ asset('images/wa.png') }}" alt="WhatsApp" width="50">
    </a>
</footer>
