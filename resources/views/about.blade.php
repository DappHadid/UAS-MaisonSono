@extends('layouts.app')

@section('content')
    {{-- Navbar --}}
    <x-navbar />

    <style>
        /* General Styling for About Page */
        body {
            font-family: 'Inter', sans-serif; /* Menggunakan font Inter */
            color: #333;
            background-color: #f8fcf8; /* Light green background */
        }

        .section-padding {
            padding: 80px 0;
        }

        .text-green {
            color: #2E7D32; /* Darker green for headings */
        }

        .bg-light-green {
            background-color: #E8F5E9; /* Very light green background */
        }

        .btn-green {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-green:hover {
            background-color: #388E3C;
            transform: translateY(-2px);
            color: white; /* Ensure text remains white on hover */
        }

        .rounded-xl {
            border-radius: 1.5rem !important; /* Larger border-radius */
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(rgba(76, 175, 80, 0.8), rgba(46, 125, 50, 0.8)), url('{{ asset('images/bg_about_hero.jpg') }}') no-repeat center center / cover;
            color: white;
            text-align: center;
            padding: 100px 0;
            position: relative;
            overflow: hidden;
        }

        .hero-section h1 {
            font-size: 3.5em;
            font-weight: bold;
            margin-bottom: 20px;
            animation: fadeInDown 1s ease-out;
        }

        .hero-section p {
            font-size: 1.2em;
            max-width: 700px;
            margin: 0 auto 30px;
            animation: fadeInUp 1s ease-out 0.3s;
            animation-fill-mode: both;
        }

        /* Our Story Section */
        .story-section img {
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .story-section img:hover {
            transform: scale(1.02);
        }

        /* Social Media Sections (TikTok & Instagram) */
        .social-media-section {
            background-color: #F1F8E9; /* Lighter green background */
            padding: 60px 0;
            text-align: center;
        }

        .social-media-section h2 {
            font-size: 2.5em;
            font-weight: bold;
            margin-bottom: 40px;
            color: #2E7D32;
        }

        .video-grid, .image-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); /* Responsive grid */
            gap: 25px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .social-card {
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between; /* Untuk menempatkan overlay di bawah */
        }

        .social-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .social-card video, .social-card img {
            width: 100%;
            height: 350px; /* Fixed height for consistency */
            object-fit: cover;
            display: block;
        }

        .social-card .overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.7), rgba(0,0,0,0));
            color: white;
            padding: 15px;
            text-align: left;
            font-size: 0.9em;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }

        .social-card .overlay .icon-platform {
            font-size: 1.5em;
            margin-right: 5px;
        }

        .social-card .overlay .engagement-stats {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .social-card .overlay .stat-item {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .social-card .overlay .stat-item i {
            font-size: 1.1em;
        }

        /* Our Social Media Section */
        .our-social-section {
            text-align: center;
            padding: 60px 0;
            background-color: #fff;
        }

        .our-social-section .social-links a {
            font-size: 3em;
            color: #4CAF50;
            margin: 0 20px;
            transition: color 0.3s ease, transform 0.3s ease;
        }

        .our-social-section .social-links a:hover {
            color: #2E7D32;
            transform: translateY(-5px);
        }

        /* Animations */
        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .hero-section h1 {
                font-size: 2.5em;
            }
            .hero-section p {
                font-size: 1em;
            }
            .section-padding {
                padding: 50px 0;
            }
            .social-media-section h2 {
                font-size: 2em;
            }
            .video-grid, .image-grid {
                grid-template-columns: 1fr; /* Single column on small screens */
            }
            .our-social-section .social-links a {
                font-size: 2.5em;
                margin: 0 10px;
            }
        }
    </style>

    <main>
        {{-- Hero Section --}}
        <section class="hero-section">
            <div class="container">
                <h1>Discover the Essence of Maisonsono</h1>
                <p>
                    At Maisonsono, we believe in crafting more than just fragrances; we create experiences.
                    Each bottle holds a story, a memory, and a unique expression of elegance.
                    Explore our journey and the passion behind every scent.
                </p>
                <a href="#our-story" class="btn btn-green">Our Story</a>
            </div>
        </section>

        {{-- Our Story Section --}}
        <section id="our-story" class="section-padding">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 mb-4 mb-md-0">
                        <img src="{{ asset('images/about_story.jpg') }}" alt="Maisonsono Story" class="img-fluid rounded-xl">
                    </div>
                    <div class="col-md-6">
                        <h2 class="text-green fw-bold mb-4">The Maisonsono Journey</h2>
                        <p class="lead">
                            Founded on the principle of timeless elegance and modern sophistication, Maisonsono is dedicated to the art of perfumery. We meticulously select the finest ingredients from around the globe to compose unique fragrances that captivate the senses and leave a lasting impression.
                        </p>
                        <p>
                            Our commitment extends beyond exquisite scents. We are passionate about sustainability, ethical sourcing, and creating products that resonate with your individuality. Join us in celebrating the beauty of scent and finding your perfect olfactory signature.
                        </p>
                        <a href="{{ route('discover') }}" class="btn btn-green mt-3">Explore Our Scents</a>
                    </div>
                </div>
            </div>
        </section>

        
        {{-- Our Social Media Section --}}
        <section class="our-social-section section-padding">
            <div class="container">
                <h2 class="text-green fw-bold mb-5">Connect With Us!</h2>
                <p class="lead mb-5">
                    Follow Maisonsono on our social media channels to stay updated on new releases,
                    exclusive offers, and behind-the-scenes content.
                </p>
                <div class="social-links">
                    <a href="https://www.tiktok.com/@maisonsono" target="_blank" aria-label="TikTok"><i class="fab fa-tiktok"></i></a>
                    <a href="https://www.instagram.com/maisonsono" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    {{-- Tambahkan link sosial media lain jika ada --}}
                    {{-- <a href="#" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a> --}}
                    {{-- <a href="#" target="_blank" aria-label="Twitter"><i class="fab fa-twitter"></i></a> --}}
                </div>
            </div>
        </section>
    </main>

    {{-- Footer --}}
    <x-footer />

    <script>
        // Optional: Implement Intersection Observer for animations if desired
        // This script will make elements fade in as they scroll into view.
        document.addEventListener('DOMContentLoaded', function() {
            const observerOptions = {
                root: null, // viewport
                rootMargin: '0px',
                threshold: 0.1 // 10% of the element must be visible
            };

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('fade-in');
                        observer.unobserve(entry.target); // Stop observing once animated
                    }
                });
            }, observerOptions);

            // Apply to sections or specific elements you want to animate
            document.querySelectorAll('.section-padding h2, .section-padding p, .section-padding img, .social-card, .our-social-section .social-links').forEach(el => {
                el.classList.add('fade-in-initial'); // Add initial state for animation
                observer.observe(el);
            });

            // Play/pause videos in social cards when they are in view
            const videoObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    const video = entry.target.querySelector('video');
                    if (video) {
                        if (entry.isIntersecting) {
                            video.play().catch(error => {
                                console.log("Autoplay prevented for video:", error);
                            });
                        } else {
                            video.pause();
                            video.currentTime = 0; // Reset video when out of view
                        }
                    }
                });
            }, {
                threshold: 0.75 // Video is considered "visible" if 75% is in viewport
            });

            document.querySelectorAll('.social-card').forEach(card => {
                videoObserver.observe(card);
            });
        });
    </script>
    <style>
        /* Styles for scroll-based fade-in animation */
        .fade-in-initial {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        .fade-in {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
@endsection