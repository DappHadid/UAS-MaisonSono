@extends('layouts.app')

@section('content')
<div class="container my-4">
    <h1 class="mb-4 text-primary">📊 Dashboard Sales & Revenue</h1>

    <!-- Summary Cards -->
    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card text-white bg-primary shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Pesanan</h5>
                    <p class="card-text display-5">{{ $totalOrders }}</p>
                    <i class="bi bi-cart-check-fill fs-1"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Pendapatan</h5>
                    <p class="card-text display-5">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</p>
                    <i class="bi bi-currency-dollar fs-1"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Produk Terlaris</h5>
                    <p class="card-text display-5">{{ $topProducts->first()->name ?? '-' }}</p>
                    <i class="bi bi-star-fill fs-1"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart Penjualan Per Hari -->
    <div class="card mb-5 shadow-sm">
        <div class="card-header bg-info text-white">
            <h5 class="mb-0">Grafik Pendapatan 7 Hari Terakhir</h5>
        </div>
        <div class="card-body">
            <canvas id="salesChart" height="100"></canvas>
        </div>
    </div>

    <!-- Top Products List -->
    <div class="card shadow-sm">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0">5 Produk Terlaris</h5>
        </div>
        <div class="card-body">
            @foreach($topProducts as $product)
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <span>{{ $product->name }}</span>
                        <span>{{ $product->total_sold }}</span>
                    </div>
                    <div class="progress" style="height: 20px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ ($product->total_sold / $topProducts->first()->total_sold) * 100 }}%" aria-valuenow="{{ $product->total_sold }}" aria-valuemin="0" aria-valuemax="{{ $topProducts->first()->total_sold }}"></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('salesChart').getContext('2d');
    const salesData = @json($salesPerDay);

    const labels = salesData.map(item => item.date);
    const data = salesData.map(item => item.revenue);

    const salesChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Pendapatan (Rp)',
                data: data,
                fill: true,
                backgroundColor: 'rgba(13, 110, 253, 0.2)',
                borderColor: 'rgba(13, 110, 253, 1)',
                tension: 0.3,
                pointRadius: 5,
                pointHoverRadius: 7,
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'Rp ' + value.toLocaleString();
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    labels: {
                        color: '#0d6efd',
                        font: {
                            size: 14,
                            weight: 'bold'
                        }
                    }
                }
            }
        }
    });
</script>
@endsection
