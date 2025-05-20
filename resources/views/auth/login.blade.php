@extends('layouts.app')

@section('styles')
<style>
body {
    background-image: url('{{ asset('images/bg-login.jpg') }}');
    background-repeat: no-repeat;
    background-position: center center;
    background-attachment: fixed;
    background-size: cover;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    min-height: 100vh;
}

    .login-container {
        min-height: 90vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem;
    }
    .login-card {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 12px 30px rgba(0,0,0,0.12);
        display: flex;
        overflow: hidden;
        max-width: 900px;
        width: 100%;
    }
    .login-image {
        flex: 1;
        background: url('{{ asset('images/login.png') }}') center center/cover no-repeat;
        display: none;
    }
    .login-form {
        flex: 1;
        padding: 3rem 2.5rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .form-header {
        font-size: 2.2rem;
        font-weight: 700;
        margin-bottom: 2rem;
        color: #333;
        text-align: center;
        letter-spacing: 1px;
    }
    label {
        font-weight: 600;
        color: #555;
        margin-bottom: 0.5rem;
        display: block;
    }
    input.form-control {
        border-radius: 10px;
        border: 1.5px solid #ccc;
        padding: 0.75rem 1rem;
        font-size: 1rem;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }
    input.form-control:focus {
        border-color: #6B705C;
        box-shadow: 0 0 8px rgba(107, 112, 92, 0.5);
        outline: none;
    }
    .invalid-feedback {
        font-size: 0.9rem;
        color: #d9534f;
        margin-top: 0.25rem;
    }
    .form-check-label {
        color: #555;
        font-weight: 500;
    }
    .btn-primary {
        background-color: #EAE4D5;
        border-color: white;
        font-weight: 700;
        padding: 0.75rem;
        border-radius: 12px;
        font-size: 1.1rem;
        transition: background-color 0.3s ease;
        width: 100%;
        margin-top: 1.5rem;
    }
    .btn-primary:hover {
        background-color: #B6B09F;
        border-color: #B6B09F;
    }
    .forgot-password {
        color: #333;
        margin-top: 1rem;
        text-align: center;
    }
    .forgot-password a {
        color: #333;
        text-decoration: none;
        font-weight: 600;
        transition: color 0.3s ease;
    }
    .forgot-password a:hover {
        text-decoration: underline;
    }
    @media (min-width: 768px) {
        .login-image {
            display: block;
        }
    }
    @media (max-width: 767.98px) {
        .login-card {
            flex-direction: column;
            border-radius: 12px;
        }
        .login-image {
            height: 200px;
            border-radius: 12px 12px 0 0;
        }
        .login-form {
            padding: 2rem 1.5rem;
        }
    }
    </style>
@endsection

@section('content')
<div class="login-container">
    <div class="login-card">
        <div class="login-image"></div>
        <div class="login-form">
            <div class="form-header">{{ __('Login') }}</div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email">{{ __('Email Address') }}</label>
                    <input id="email" type="email" 
                        class="form-control @error('email') is-invalid @enderror" 
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password">{{ __('Password') }}</label>
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

                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                    <div class="forgot-password">
                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>
@endsection
