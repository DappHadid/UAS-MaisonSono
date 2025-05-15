@extends('layouts.app')

@section('styles')
<style>
    body {
        background-color: #A27B5C;
    }
    .form-container {
        background: white;
        padding: 2.5rem 2rem;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        transition: box-shadow 0.3s ease;
    }
    .form-container:hover {
        box-shadow: 0 12px 30px rgba(0,0,0,0.15);
    }
    .form-header {
        font-weight: 700;
        font-size: 1.8rem;
        margin-bottom: 1.5rem;
        color: #333;
        text-align: center;
        letter-spacing: 1px;
    }
    label {
        font-weight: 600;
        color: #555;
    }
    .btn-primary {
        background-color: #6B705C;
        border-color: #6B705C;
        font-weight: 600;
        padding: 0.5rem 1.5rem;
        border-radius: 8px;
        transition: background-color 0.3s ease;
    }
    .btn-primary:hover {
        background-color: #556148;
        border-color: #556148;
    }
    .invalid-feedback {
        font-size: 0.9rem;
    }
    /* Responsive tweaks */
    @media (max-width: 767.98px) {
        .form-container {
            padding: 2rem 1.5rem;
            border-radius: 10px;
        }
        .form-header {
            font-size: 1.5rem;
        }
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 80vh;">
        <!-- Kolom Gambar -->
        <div class="col-md-6 d-none d-md-block">
            <img src="{{ asset('images/login.png') }}" alt="Register Image" class="img-fluid rounded shadow-sm">
        </div>

        <!-- Kolom Form -->
        <div class="col-md-6 d-flex justify-content-center align-items-center">
            <div class="form-container w-100" style="max-width: 420px;">
                <div class="form-header">{{ __('Register') }}</div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('Name') }}</label>
                        <input id="name" type="text" 
                            class="form-control @error('name') is-invalid @enderror" 
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                        <input id="email" type="email" 
                            class="form-control @error('email') is-invalid @enderror" 
                            name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input id="password" type="password" 
                            class="form-control @error('password') is-invalid @enderror" 
                            name="password" required autocomplete="new-password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" 
                            class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
