@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-6">Dashboard Admin</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-xl font-semibold">Total Pesanan</h2>
            <p class="text-4xl font-bold">{{ $totalPesanan }}</p>
        </div>
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-xl font-semibold">Total Produk</h2>
            <p class="text-4xl font-bold">{{ $totalProduk }}</p>
        </div>
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-xl font-semibold">Total Pelanggan</h2>
            <p class="text-4xl font-bold">{{ $totalPelanggan }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Chart Pesanan Per Bulan -->
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-xl font-semibold mb-4">Pesanan Per Bulan</h2>
            <div id="chartPesananPerBulan"></div>
        </div>

        <!-- Chart Status Pesanan -->
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-xl font-semibold mb-4">Status Pesanan</h2>
            <div id="chartStatusPesanan"></div>
        </div>
    </div>

    <div class="bg-white p-6 rounded shadow mt-6">
        <h2 class="text-xl font-semibold mb-4">Tren Penjualan 7 Hari Terakhir</h2>
        <div id="chartTrenPenjualanHarian"></div>
    </div>
</div>

<!-- ApexCharts CDN -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
    // Chart Pesanan Per Bulan
    var optionsPesananPerBulan = {
        chart: { type: 'bar', height: 350 },
        series: [{
            name: 'Pesanan',
            data: @json($pesananPerBulan)
        }],
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        }
    };
    var chartPesananPerBulan = new ApexCharts(document.querySelector("#chartPesananPerBulan"), optionsPesananPerBulan);
    chartPesananPerBulan.render();

    // Chart Status Pesanan (Pie Chart)
    var optionsStatusPesanan = {
        chart: { type: 'pie', height: 350 },
        series: @json($statusPesananData),
        labels: @json($statusLabels),
        legend: { position: 'bottom' }
    };
    var chartStatusPesanan = new ApexCharts(document.querySelector("#chartStatusPesanan"), optionsStatusPesanan);
    chartStatusPesanan.render();

    // Chart Tren Penjualan Harian (Line Chart)
    var optionsTrenPenjualanHarian = {
        chart: { type: 'line', height: 350 },
        series: [{
            name: 'Penjualan',
            data: @json($trenPenjualanHarian)
        }],
        xaxis: {
            categories: @json($tanggalLabels)
        }
    };
    var chartTrenPenjualanHarian = new ApexCharts(document.querySelector("#chartTrenPenjualanHarian"), optionsTrenPenjualanHarian);
    chartTrenPenjualanHarian.render();
</script>
@endsection
