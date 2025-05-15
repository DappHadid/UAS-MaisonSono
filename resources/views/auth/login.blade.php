@extends('layouts.app')

@section('styles')
<style>
    body {
        background-color: #DCD7C9;
    }
    .form-container {
        background: white;
        padding: 2.5rem 2rem;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        transition: box-shadow 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
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
    .form-check-label {
        color: #555;
        font-weight: 500;
    }
    .invalid-feedback {
        font-size: 0.9rem;
    }
    /* Responsive tweaks */
    @media (max-width: 767.98px) {
        .form-container {
            padding: 2rem 1.5rem;
            border-radius: 10px;
            height: auto;
        }
        .form-header {
            font-size: 1.5rem;
        }
    }
</style>
@endsection

@section('content')
<div class="container" style="min-height: 80vh;">
    <div class="row d-flex" style="min-height: 80vh;">
        <!-- Kolom Gambar -->
        <div class="col-md-6 d-none d-md-block p-0 h-100">
            <img src="{{ asset('images/login.png') }}" alt="Login Image" class="img-fluid h-100 w-100 object-fit-cover rounded-start">
        </div>

        <!-- Kolom Form -->
        <div class="col-md-6 d-flex align-items-center justify-content-center p-4 h-100">
            <div class="form-container w-100" style="max-width: 420px;">
                <div class="form-header">{{ __('Login') }}</div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                        <input id="email" type="email" 
                            class="form-control @error('email') is-invalid @enderror" 
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input id="password" type="password" 
                            class="form-control @error('password') is-invalid @enderror" 
                            name="password" required autocomplete="current-password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 form-check">
                        <input class="form-check-input" type="checkbox" 
                            name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>
                    </div>

                    @if (Route::has('password.request'))
                        <div class="text-center">
                            <a class="text-decoration-none" href="{{ route('password.request') }}" style="color: #6B705C;">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
