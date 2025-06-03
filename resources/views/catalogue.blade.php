@extends('layouts.app')

@section('content')
<x-nav />

{{-- Hero Section --}}
<section style="background-color: #1f2f23; height: 100vh; position: relative; overflow: hidden;">
    <div class="position-absolute top-50 start-0 translate-middle-y text-white">
        <img id="hero-logo" src="{{ asset('images/catalogue.png') }}" style="width: 1000px;" alt="Catalogue Logo">
    </div>
</section>

{{-- Category Buttons --}}
<div style="max-width: 1200px; margin: 0 auto; text-align: center; padding: 60px 20px; background-color: #1f2f23 ; border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <div id="category-buttons" style="display: flex; justify-content: center; gap: 40px; flex-wrap: wrap;">

        {{-- Sweet --}}
        <button onclick="showCategory('sweet')"
            style="display: flex; align-items: center; width: 320px; height: 200px; background-color: pink; border-radius: 15px; border: none; cursor: pointer; padding: 10px;">
            <div style="width: 140px; height: 160px; border-radius: 15px; overflow: hidden; flex-shrink: 0; margin-right: 20px;">
                <img src="{{ asset('images/parfume.png') }}" alt="Sweet" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <strong style="font-size: 1.7em;">Sweet</strong>
        </button>

        {{-- Fruity --}}
        <button onclick="showCategory('fruity')"
            style="display: flex; align-items: center; width: 320px; height: 200px; background-color: peachpuff; border-radius: 15px; border: none; cursor: pointer; padding: 10px;">
            <div style="width: 140px; height: 160px; border-radius: 15px; overflow: hidden; flex-shrink: 0; margin-right: 20px;">
                <img src="{{ asset('images/parfume.png') }}" alt="Fruity" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <strong style="font-size: 1.7em;">Fruity</strong>
        </button>

        {{-- Floral --}}
        <button onclick="showCategory('floral')"
            style="display: flex; align-items: center; width: 320px; height: 200px; background-color: lavender; border-radius: 15px; border: none; cursor: pointer; padding: 10px;">
            <div style="width: 140px; height: 160px; border-radius: 15px; overflow: hidden; flex-shrink: 0; margin-right: 20px;">
                <img src="{{ asset('images/parfume.png') }}" alt="Floral" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <strong style="font-size: 1.7em;">Floral</strong>
        </button>

    </div>
</div>

<x-footer />
@endsection
