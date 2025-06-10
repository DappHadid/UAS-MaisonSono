@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 bg-gray-50">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Dashboard</h1>
        <button onclick="printDashboard()" class="inline-flex items-center px-4 py-2 bg-red-600 text-white font-semibold text-sm rounded-lg shadow hover:bg-red-700 transition">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
            Export PDF
        </button>
    </div>

    <div id="analytics">
        {{-- Kartu Statistik --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-blue-500 flex items-center space-x-4 transition hover:shadow-xl hover:scale-105">
                <div class="bg-blue-100 p-3 rounded-full"><svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4z"></path></svg></div>
                <div><h2 class="text-lg font-semibold text-gray-600">Total Pesanan</h2><p class="text-3xl font-bold text-gray-800">{{ $totalPesanan }}</p></div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-green-500 flex items-center space-x-4 transition hover:shadow-xl hover:scale-105">
                <div class="bg-green-100 p-3 rounded-full"><svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v.01"></path></svg></div>
                <div><h2 class="text-lg font-semibold text-gray-600">Total Pendapatan</h2><p class="text-3xl font-bold text-gray-800">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</p></div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-indigo-500 flex items-center space-x-4 transition hover:shadow-xl hover:scale-105">
                <div class="bg-indigo-100 p-3 rounded-full"><svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg></div>
                <div><h2 class="text-lg font-semibold text-gray-600">Total Pelanggan</h2><p class="text-3xl font-bold text-gray-800">{{ $totalPelanggan }}</p></div>
            </div>
        </div>

        {{-- Area Chart --}}
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-6 mb-6">
            <div class="lg:col-span-3 bg-white p-6 rounded-xl shadow-lg">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Tren Penjualan & Jumlah Pesanan (7 Hari Terakhir)</h2>
                <div id="mixedChartHarian"></div>
            </div>
            <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-lg">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Komposisi Status Pesanan</h2>
                <div id="chartStatusPesanan"></div>
            </div>
        </div>
        
        <div class="bg-white p-6 rounded-xl shadow-lg mt-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Analisis Pendapatan & Jumlah Pesanan (Tahun Ini)</h2>
            <div id="comboChartBulanan"></div>
        </div>

        {{-- Tabel Pengguna Terbaru --}}
        <div class="bg-white p-6 rounded-xl shadow-lg mt-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Pelanggan Terbaru</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Bergabung</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($latestUsers as $user)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $user->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->created_at->format('d F Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-4 text-center text-sm text-gray-500">Tidak ada data pelanggan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    <!-- ApexCharts CDN -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // 1. Chart Combo: Pendapatan (Line) & Jumlah Pesanan (Column) per Bulan
        var optionsComboBulanan = {
            chart: { type: 'line', height: 350, toolbar: { show: false } },
            series: [
                { name: 'Total Pendapatan', type: 'column', data: @json($dataPendapatanBulanan) },
                { name: 'Jumlah Pesanan', type: 'line', data: @json($dataJumlahPesanan) }
            ],
            stroke: { width: [0, 4] }, // Lebar garis (0 untuk bar, 4 untuk line)
            xaxis: { categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'] },
            yaxis: [
                { seriesName: 'Total Pendapatan', title: { text: 'Total Pendapatan (Rp)' }, labels: { formatter: function (val) { return val/1000 + "k" }}},
                { seriesName: 'Jumlah Pesanan', opposite: true, title: { text: 'Jumlah Pesanan' }}
            ],
            colors: ['#10b981', '#4f46e5'],
            tooltip: {
                y: [{
                    formatter: function (val) { return "Rp " + val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") }
                }, {
                    formatter: function (val) { return val + " pesanan" }
                }]
            }
        };
        var comboChartBulanan = new ApexCharts(document.querySelector("#comboChartBulanan"), optionsComboBulanan);
        comboChartBulanan.render();

        // 2. Chart Status Pesanan (Donut Chart)
        var optionsStatusPesanan = {
            chart: { type: 'donut', height: 350 },
            series: @json($statusPesananData),
            labels: @json(array_map('ucfirst', $statusLabels->toArray())),
            legend: { position: 'bottom' },
            colors:['#facc15', '#3b82f6', '#6366f1', '#22c55e', '#ef4444', '#9ca3af'],
        };
        var chartStatusPesanan = new ApexCharts(document.querySelector("#chartStatusPesanan"), optionsStatusPesanan);
        chartStatusPesanan.render();

        // 3. Mixed Chart: Penjualan (Area) & Jumlah Pesanan (Line) Harian
        var optionsMixedHarian = {
            chart: { type: 'area', height: 350, toolbar: { show: false } },
            series: [
                { name: 'Total Penjualan', type: 'area', data: @json($trenPenjualanHarian) },
                { name: 'Jumlah Pesanan', type: 'line', data: @json($trenJumlahPesananHarian) }
            ],
            xaxis: { categories: @json($tanggalLabels) },
            colors: ['#22c55e', '#ef4444'],
            stroke: { curve: 'smooth', width: [0, 3] },
            dataLabels: { enabled: false },
            tooltip: {
                y: [{
                    title: { formatter: function (seriesName) { return seriesName + ' (Rp)' } },
                    formatter: function (val) { return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") }
                }, {
                    title: { formatter: function (seriesName) { return seriesName } }
                }]
            }
        };
        var mixedChartHarian = new ApexCharts(document.querySelector("#mixedChartHarian"), optionsMixedHarian);
        mixedChartHarian.render();
    });
    </script>

    <script>
        async function printDashboard() {
            const {
                jsPDF
            } = window.jspdf;

            const section = document.getElementById("analytics");

            await html2canvas(section, {
                scale: 2,
                useCORS: true
            }).then((canvas) => {
                const imgData = canvas.toDataURL("image/png");
                const pdf = new jsPDF('p', 'pt', 'a4');

                const imgProps = pdf.getImageProperties(imgData);
                const pdfWidth = pdf.internal.pageSize.getWidth();
                const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

                pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);

                //watermark
                pdf.setTextColor(196,242,211);
                pdf.setFontSize(100);
                pdf.setFont(undefined, 'bold');
                pdf.text("MAISON SONO", pdfWidth / 1.2, pdfHeight / 1, {
                    angle: 60,
                    align: 'center',
                });

                pdf.save("laporan-dashboard.pdf");
            });
        }
    </script>
@endsection
