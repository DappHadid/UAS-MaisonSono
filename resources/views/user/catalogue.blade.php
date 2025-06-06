@extends('layouts.app')

@section('content')
    <x-navbar />

    <div style="text-align: center; margin-top: 50px;">
        <h1>Catalogue</h1>
        <div id="category-buttons" style="display: flex; justify-content: center; gap: 40px; margin-top: 30px;">

            <button onclick="showCategory('sweet')"
                style="display: flex; align-items: center; width: 320px; height: 200px; background-color: pink; border-radius: 15px; border: none; cursor: pointer; padding: 10px; box-sizing: border-box;">
                <div
                    style="width: 140px; height: 160px; border-radius: 15px; overflow: hidden; flex-shrink: 0; margin-right: 20px;">
                    <img src="{{ asset('images/parfume.png') }}" alt="Sweet"
                        style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <strong style="font-size: 1.7em; align-self: center;">Sweet</strong>
            </button>

            <button onclick="showCategory('fruity')"
                style="display: flex; align-items: center; width: 320px; height: 200px; background-color: peachpuff; border-radius: 15px; border: none; cursor: pointer; padding: 10px; box-sizing: border-box;">
                <div
                    style="width: 140px; height: 160px; border-radius: 15px; overflow: hidden; flex-shrink: 0; margin-right: 20px;">
                    <img src="{{ asset('images/parfume.png') }}" alt="Fruity"
                        style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <strong style="font-size: 1.7em; align-self: center;">Fruity</strong>
            </button>

            <button onclick="showCategory('floral')"
                style="display: flex; align-items: center; width: 320px; height: 200px; background-color: lavender; border-radius: 15px; border: none; cursor: pointer; padding: 10px; box-sizing: border-box;">
                <div
                    style="width: 140px; height: 160px; border-radius: 15px; overflow: hidden; flex-shrink: 0; margin-right: 20px;">
                    <img src="{{ asset('images/parfume.png') }}" alt="Floral"
                        style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <strong style="font-size: 1.7em; align-self: center;">Floral</strong>
            </button>

        </div>
    </div>

    <div id="products" style="margin-top: 60px; padding: 40px; transition: opacity 0.4s ease;"></div>

    <x-footer />
@endsection
