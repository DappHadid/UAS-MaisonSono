<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0" style="background-color: #3F4F44">
    <div class="d-flex flex-column align-items-sm-start px-3 pt-2 text-white min-vh-100">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class="fs-4 text-white">MAISON SONO</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-sm-start" id="menu">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}"
                    class="nav-link text-white {{ request()->routeIs('dashboard') ? 'bg-secondary fw-bold ' : '' }}">
                    <i class="bi bi-house-door me-2"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <i class="bi bi-graph-up me-2"></i> Analitics
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <i class="bi bi-cart me-2"></i> Orders
                </a>
            </li>
            <li>
                <a href="{{ route('product') }}"
                    class="nav-link text-white {{ request()->routeIs('product') ? 'bg-secondary fw-bold ' : '' }}">
                    <i class="bi bi-box-seam me-2"></i> Products
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <i class="bi bi-people me-2"></i> Customers
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <i class="bi bi-coin me-2"></i> Incomes
                </a>
            </li>
        </ul>
        <hr>
        <div class="dropdown pb-4">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                data-bs-toggle="dropdown">
                Logout
            </a>
            <ul class="dropdown-menu bg-danger text-small shadow">
                <li><a class="dropdown-item text-white" href="#">Are you sure want to logout?</a></li>
            </ul>
        </div>
    </div>
</div>
