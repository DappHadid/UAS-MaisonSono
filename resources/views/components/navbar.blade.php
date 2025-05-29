

<nav class="navbar navbar-expand-lg navbar-dark py-3" style="background-color: #1f2f23; position: relative;">
    <div class="container-fluid d-flex justify-content-between align-items-center">

        <!-- Left Side -->
        <div class="d-flex align-items-center">
            <a class="nav-link text-white me-3" href="{{ route('landing') }}">Home</a>
            <a class="nav-link text-white me-3" href="{{ route('shop') }}">Shop</a>
            <a class="nav-link text-white" href="{{ route('catalogue') }}">Catalogue</a>
        </div>

        <!-- Logo -->
        <a id="navbar-logo-link" class="navbar-brand position-absolute top-50 start-50 translate-middle text-center"
            href="{{ route('landing') }}" style="font-weight: bold;">
            <img id="navbar-main-logo" src="{{ asset('images/Sono_white.png') }}" style="width: 100px; height: auto;"
                alt="Logo Maison Sono">
        </a>

        <!-- Right Side -->
        <div class="d-flex align-items-center">
            <ul class="navbar-nav d-flex flex-row align-items-center mb-0">
                <li class="nav-item me-3">
                    <a href="#" class="nav-link text-white">
                        <i class="bi bi-search"></i>
                    </a>
                </li>
                <!-- Icon Login Register -->
                <li class="nav-item dropdown me-3">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false" v-pre>
                        <i class="bi bi-person"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        @guest
                            @if (Route::has('login'))
                                <li>
                                    <a class="dropdown-item" href="{{ route('login') }}">
                                        {{ __('Login') }}
                                    </a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li>
                                    <a class="dropdown-item" href="{{ route('register') }}">
                                        {{ __('Register') }}
                                    </a>
                                </li>
                            @endif
                        @else
                            <li>
                                <a class="dropdown-item disabled" href="#" tabindex="-1" aria-disabled="true">
                                    {{ Auth::user()->name }}
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endguest
                    </ul>
                </li>

                <li class="nav-item me-3">
                    <a href="{{ route('keranjang') }}"class="nav-link position-relative text-white">
                        <i class="bi bi-bag"></i>
                    </a>
                </li>
            </ul>
        </div>

    </div>
</nav>



