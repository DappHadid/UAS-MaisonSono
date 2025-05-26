@extends('layouts.app')

@section('content')
    <x-navbar />

    <div style="max-width: 700px; margin: 50px auto; padding: 20px; font-family: Arial, sans-serif; line-height: 1.6;">

        <h1 style="text-align: center; margin-bottom: 30px;">Career & History of Maison Sono Parfum</h1>

        <div id="history-container"
            style="position: relative; overflow: hidden; max-height: 150px; transition: max-height 0.5s ease; border: 1px solid #ccc; border-radius: 10px; padding: 20px; background-color: #fafafa;">
            <p id="history-text" style="margin: 0;">
                Maison Sono Parfum merupakan salah satu unit usaha mikro kecil dan menengah (UMKM) yang bergerak di bidang
                produksi dan penjualan parfum lokal. Didirikan oleh pelaku usaha muda yang kreatif, Maison Sono Parfum hadir
                dengan konsep aroma khas yang unik dan kemasan estetik, menyasar konsumen milenial dan Gen Z yang memiliki
                perhatian tinggi terhadap gaya hidup dan personal care.
                Strategi distribusi yang digunakan Maison Sono Parfum cukup inovatif, yaitu dengan menitipkan produk mereka
                di beberapa kafe. Pendekatan ini tidak hanya meningkatkan visibilitas produk di tempat yang ramai dikunjungi
                target pasar, namun juga memberi nuansa pengalaman konsumen yang lebih personal dan kontekstual.
                Selain strategi offline, Maison Sono Parfum juga telah menjajaki berbagai kanal digital seperti Instagram,
                WhatsApp, Shopee, dan Tokopedia untuk menjangkau pasar yang lebih luas.
            </p>
        </div>

        <button id="toggle-btn"
            style="display: block; margin: 20px auto 0 auto; padding: 10px 30px; font-size: 1em; border-radius: 25px; border: none; background-color: #9c27b0; color: white; cursor: pointer; transition: background-color 0.3s ease;">
            Read More
        </button>
    </div>

    <x-footer />

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.getElementById('history-container');
            const btn = document.getElementById('toggle-btn');
            let expanded = false;

            btn.addEventListener('click', function() {
                if (!expanded) {
                    // Expand container height to fit full content
                    container.style.maxHeight = container.scrollHeight + 'px';
                    btn.textContent = 'Read Less';
                } else {
                    // Collapse container
                    container.style.maxHeight = '150px';
                    btn.textContent = 'Read More';
                }
                expanded = !expanded;
            });

            // Optional: On page load, collapse content to 150px max height
            container.style.maxHeight = '150px';
        });
    </script>
@endsection
