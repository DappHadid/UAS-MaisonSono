@extends('admin.layouts.app')

@section('content')
<<<<<<< HEAD
    {{-- Header Halaman --}}
    <div class="flex flex-wrap sm:flex-nowrap justify-between items-center mb-6 gap-4">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Dashboard</h1>
        <button onclick="printDashboard()" class="inline-flex items-center px-4 py-2 bg-red-600 text-white font-semibold text-sm rounded-lg shadow-md hover:bg-red-700 transition-transform hover:scale-105">
            <i class="fas fa-file-pdf mr-2"></i>
            Export PDF
        </button>
    </div>

    <div id="analytics">
        {{-- Kartu Statistik dengan Dark Mode --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg border-l-4 border-blue-500 flex items-center space-x-4 transition-all duration-300 hover:shadow-xl hover:scale-105">
                <div class="bg-blue-100 dark:bg-gray-700 p-4 rounded-full"><i class="fas fa-shopping-cart fa-2x text-blue-600 dark:text-blue-400"></i></div>
                <div>
                    <h2 class="text-lg font-semibold text-gray-600 dark:text-gray-400">Total Orders</h2>
                    <p class="text-3xl font-bold text-gray-800 dark:text-white">{{ $totalPesanan }}</p>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg border-l-4 border-green-500 flex items-center space-x-4 transition-all duration-300 hover:shadow-xl hover:scale-105">
                <div class="bg-green-100 dark:bg-gray-700 p-4 rounded-full"><i class="fas fa-dollar-sign fa-2x text-green-600 dark:text-green-400"></i></div>
                <div>
                    <h2 class="text-lg font-semibold text-gray-600 dark:text-gray-400">Total Revenue</h2>
                    <p class="text-3xl font-bold text-gray-800 dark:text-white">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</p>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg border-l-4 border-indigo-500 flex items-center space-x-4 transition-all duration-300 hover:shadow-xl hover:scale-105">
                <div class="bg-indigo-100 dark:bg-gray-700 p-4 rounded-full"><i class="fas fa-users fa-2x text-indigo-600 dark:text-indigo-400"></i></div>
                <div>
                    <h2 class="text-lg font-semibold text-gray-600 dark:text-gray-400">Total Customers</h2>
                    <p class="text-3xl font-bold text-gray-800 dark:text-white">{{ $totalPelanggan }}</p>
                </div>
            </div>
        </div>

        {{-- Area Chart dengan Dark Mode --}}
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-6 mb-6">
            <div class="lg:col-span-3 bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">Sales & Orders Trend (Last 7 Days)</h2>
                <div id="mixedChartHarian" ></div>
            </div>
            <div class="lg:col-span-2 bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">Order Status Composition</h2>
                <div id="chartStatusPesanan"></div>
            </div>
        </div>
        
        <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg mt-6">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">Monthly Revenue & Orders Analysis (This Year)</h2>
            <div id="comboChartBulanan"></div>
        </div>

        {{-- Tabel Pengguna Terbaru dengan Dark Mode --}}
        <div class="bg-white dark:bg-gray-800 shadow-xl rounded-xl mt-6 overflow-hidden">
            <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Newest Customers</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full text-base">
                    <thead class="bg-gray-50 dark:bg-gray-700/50 text-sm text-gray-700 dark:text-gray-300 uppercase">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-left font-bold">Name</th>
                            <th scope="col" class="px-6 py-4 text-left font-bold">Email</th>
                            <th scope="col" class="px-6 py-4 text-left font-bold">Joined Date</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($latestUsers as $user)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900 dark:text-white">{{ $user->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-600 dark:text-gray-300">{{ $user->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-600 dark:text-gray-300">{{ $user->created_at->format('d F Y') }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="3" class="px-6 py-10 text-center text-gray-500 dark:text-gray-400 italic">No customer data found.</td></tr>
                        @endforelse
                    </tbody>
                </table>
=======
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 rounded-xl">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Dashboard</h1>
            <button onclick="printDashboard()"
                class="inline-flex items-center px-4 py-2 bg-red-600 text-white font-semibold text-sm rounded-lg shadow hover:bg-red-700 transition">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z">
                    </path>
                </svg>
                Export PDF
            </button>
        </div>

        <div id="analytics">
            {{-- Kartu Statistik --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <div
                    class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-blue-500 flex items-center space-x-4 transition hover:shadow-xl hover:scale-105">
                    <div class="bg-blue-100 p-3 rounded-full"><svg class="w-8 h-8 text-blue-600" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4z">
                            </path>
                        </svg></div>
                    <div>
                        <h2 class="text-lg font-semibold text-gray-600">Total Pesanan</h2>
                        <p class="text-3xl font-bold text-gray-800">{{ $totalPesanan }}</p>
                    </div>
                </div>
                <div
                    class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-green-500 flex items-center space-x-4 transition hover:shadow-xl hover:scale-105">
                    <div class="bg-green-100 p-3 rounded-full"><svg class="w-8 h-8 text-green-600" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v.01">
                            </path>
                        </svg></div>
                    <div>
                        <h2 class="text-lg font-semibold text-gray-600">Total Pendapatan</h2>
                        <p class="text-3xl font-bold text-gray-800">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
                        </p>
                    </div>
                </div>
                <div
                    class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-indigo-500 flex items-center space-x-4 transition hover:shadow-xl hover:scale-105">
                    <div class="bg-indigo-100 p-3 rounded-full"><svg class="w-8 h-8 text-indigo-600" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg></div>
                    <div>
                        <h2 class="text-lg font-semibold text-gray-600">Total Pelanggan</h2>
                        <p class="text-3xl font-bold text-gray-800">{{ $totalPelanggan }}</p>
                    </div>
                </div>
            </div>

            {{-- Area Chart --}}
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-6 mb-6">
                <div class="lg:col-span-3 bg-white p-6 rounded-xl shadow-lg">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Tren Produk & Jumlah Pesanan
                    </h2>
                    <div id="mixedChartHarian"></div>
                </div>
                <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-lg">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Komposisi Status Pesanan</h2>
                    <div id="chartStatusPesanan"></div>
                </div>
>>>>>>> b699b8c78ea6b088441b84882872abdffa47d5a9
            </div>

            <div class="bg-white p-6 rounded-xl shadow-lg mt-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Analisis Pendapatan & Jumlah Pesanan tiap Bulan</h2>
                <div id="comboChartBulanan"></div>
            </div>

            {{-- Tabel produk terlaris --}}
            <div class="bg-white p-6 rounded-xl shadow-lg mt-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Produk Terlaris</h2>
                <div id="produkTerlarisChart" class="w-full"></div>
            </div>

        </div>
    </div>

    <!-- ApexCharts CDN -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <script>
<<<<<<< HEAD
    document.addEventListener('DOMContentLoaded', function () {
            const chartThemeOptions = {
            chart: {
                background: '#FFFFFF' // Selalu gunakan background putih untuk chart
            },
            theme: {
                mode: 'light' // Selalu gunakan tema terang untuk chart
            }
        };
        var optionsComboBulanan = {
            chart: { type: 'line', height: 350, toolbar: { show: false }, ...chartThemeOptions.chart },
            series: [
                { name: 'Total Pendapatan', type: 'column', data: @json($dataPendapatanBulanan) },
                { name: 'Jumlah Pesanan', type: 'line', data: @json($dataJumlahPesanan) }
            ],
            theme: chartThemeOptions.theme, // Selalu gunakan tema terang
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
            chart: { type: 'donut', height: 350,chartTheme: chartThemeOptions.chart },
            theme: chartThemeOptions.theme,
            series: @json($statusPesananData),
            labels: @json(array_map('ucfirst', $statusLabels->toArray())),
            legend: { position: 'bottom' },
            colors:['#facc15', '#3b82f6', '#6366f1', '#22c55e', '#ef4444', '#9ca3af'],
        };
        var chartStatusPesanan = new ApexCharts(document.querySelector("#chartStatusPesanan"), optionsStatusPesanan);
        chartStatusPesanan.render();

        // 3. Mixed Chart: Penjualan (Area) & Jumlah Pesanan (Line) Harian
        var optionsMixedHarian = {
            chart: { type: 'area', height: 350, toolbar: { show: false } ,chartTheme: chartThemeOptions.chart },
            theme: chartThemeOptions.theme,
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
=======
        document.addEventListener('DOMContentLoaded', function() {
            // 1. Chart Combo: Pendapatan (Line) & Jumlah Pesanan (Column) per Bulan
            var optionsComboBulanan = {
                chart: {
                    type: 'line',
                    height: 350,
                    toolbar: {
                        show: false
                    }
                },
                series: [{
                        name: 'Total Pendapatan',
                        type: 'column',
                        data: @json($dataPendapatanBulanan)
                    },
                    {
                        name: 'Jumlah Pesanan',
                        type: 'line',
                        data: @json($dataJumlahPesanan)
                    }
                ],
                stroke: {
                    width: [0, 4]
                },
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov',
                        'Des'
                    ]
                },
                yaxis: [{
                        seriesName: 'Total Pendapatan',
                        title: {
                            text: 'Total Pendapatan (Rp)'
                        },
                        labels: {
                            formatter: function(val) {
                                return val / 1000 + "k"
                            }
                        }
                    },
                    {
                        seriesName: 'Jumlah Pesanan',
                        opposite: true,
                        title: {
                            text: 'Jumlah Pesanan'
                        }
                    }
                ],
                colors: ['#10b981', '#4f46e5'],
                tooltip: {
                    y: [{
                        formatter: function(val) {
                            return "Rp " + val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
                        }
                    }, {
                        formatter: function(val) {
                            return val + " pesanan"
                        }
                    }]
                }
            };
            var comboChartBulanan = new ApexCharts(document.querySelector("#comboChartBulanan"),
                optionsComboBulanan);
            comboChartBulanan.render();

            // 2. Chart Status Pesanan (Donut Chart)
            var optionsStatusPesanan = {
                chart: {
                    type: 'donut',
                    height: 350
                },
                series: @json($statusPesananData),
                labels: @json(array_map('ucfirst', $statusLabels->toArray())),
                legend: {
                    position: 'bottom'
                },
                colors: ['#facc15', '#3b82f6', '#6366f1', '#22c55e', '#ef4444', '#9ca3af'],
            };
            var chartStatusPesanan = new ApexCharts(document.querySelector("#chartStatusPesanan"),
                optionsStatusPesanan);
            chartStatusPesanan.render();

            // 3. Mixed Chart: Jumlah Produk Terjual(Area) & Jumlah Pesanan (Line) Harian
            var optionsMixedHarian = {
                chart: {
                    type: 'area',
                    height: 350,
                    toolbar: {
                        show: false
                    }
                },
                series: [{
                        name: 'Jumlah Produk Terjual',
                        type: 'area',
                        data: @json($trenPenjualanProdukHarian)
                    },
                    {
                        name: 'Jumlah Pesanan',
                        type: 'line',
                        data: @json($trenJumlahPesananHarian)
                    }
                ],
                xaxis: {
                    categories: @json($tanggalLabels)
                },
                colors: ['#22c55e', '#ef4444'],
                stroke: {
                    curve: 'smooth',
                    width: [0, 3]
                },
                dataLabels: {
                    enabled: false
                },
                tooltip: {
                    y: [{
                        title: {
                            formatter: function(seriesName) {
                                return seriesName + ' (Rp)'
                            }
                        },
                        formatter: function(val) {
                            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
                        }
                    }, {
                        title: {
                            formatter: function(seriesName) {
                                return seriesName
                            }
                        }
                    }]
                }
            };
            var mixedChartHarian = new ApexCharts(document.querySelector("#mixedChartHarian"), optionsMixedHarian);
            mixedChartHarian.render();
        });

        //penjualan tiap produk
            var optionsProdukTerlaris = {
                chart: {
                    type: 'bar',
                    height: 350,
                    toolbar: {
                        show: false
                    }
                },
                series: [{
                    name: 'Terjual',
                    data: @json($jumlahProdukTerjual)
                }],
                xaxis: {
                    categories: @json($namaProdukTerlaris),
                    labels: {
                        rotate: -45
                    }
                },
                colors: ['#3b82f6'],
                plotOptions: {
                    bar: {
                        horizontal: false,
                    }
                },
                dataLabels: {
                    enabled: true
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return val + " pcs"
                        }
                    }
                }
            };

        var produkTerlarisChart = new ApexCharts(document.querySelector("#produkTerlarisChart"), optionsProdukTerlaris);
        produkTerlarisChart.render();
    </script>

>>>>>>> b699b8c78ea6b088441b84882872abdffa47d5a9
    </script>

    <script>
        async function printDashboard() {
            const {
                jsPDF
            } = window.jspdf;

            const section = document.getElementById("analytics");

            const canvas = await html2canvas(section, {
                scale: 2,
                useCORS: true
            });

            const imgData = canvas.toDataURL("image/png");

            const watermarkImg =
                'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAABDgAAAQ4CAYAAADsEGyPAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAJB2SURBVHhe7N0FlB5F9jfgggghCUFDIBDc3d1tWdzd3d1tgcXd3d3dFnd3dwsEQrCEBEKQ/aaa4v/BZmZiI1XvPM85c6ZvT5ZNJu+86f511b2j/bdOAAAAACjY6OkzAAAAQLEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxRvtvnXQMANAqfv/99/DV1/3C5198Xn3+afBPYfDgwWHIL0NCxw4dQ8eOY4ROY4wRxh17nNBjwh5horqPrl26pv912eKf86NPPw79vvk6DPpxUN3Hj+HHnwaF0UdvF7qM2Tl06dKl+jzxRBOHySedLLRr1y79LwGAvxJwABTunEvPDz8M/CFVjVt9hVXDNFNOnaq8PPfS8+HhJx9NVeNWXOafYabpZ0xV63nljVfDvQ/fn6rGbbHBZmH8ccdLVeu58767w5vvvpWqvxuv7ve3Zd3vsyXEy49X33wtPFv39x6/j++8/2745Zdf0leHT/z9zjjdDGHm6WYM8889X5h6iqnSV/LWt1/f8NjTT4SXXns5fPTpJ+HLvl+E34fzcqxD+/Zh0p6TVn/W+eaaNyw07wLZBD2Nvbb+FAOadVZdK1Ut78133gp33n93qv6ua+cuYfvNt00VACUScAAUbq0t1gtff/tNqhq30nIrhL122D1Vedn94L2rG77hsd8ue4fll1ouVa3nwKMOCU88+1SqGrf9ZtuEdVdbO1Wt5/ATjwoPPvZQqv5u0p6ThCvOuiRVzaP/gP7hxjtuCfc+fF/48qu+6WzTmGzSXmHpRZcKq6+wSug2Vrd0Ng8DBv4QbrvnjvDwE4+E9z/6IJ0dde3btQ+zzTxrWGaxpcJySy5T1a2lsdfWn0YbbbRw4mHHhblmmyOdaVn3PHhvOOa041P1d3F10M2XXp8qAEqkBwdAG/LIk4+GX3/7NVX5+Pqbr8Mrr7+SqjIMHDSwWn0wvB4Yxo1frYvbMC686pKw3jYbh8uuu6LJw43o0896h4uvvjSsu/VG4eyLz622e7S2ft/0C2dceFZYZ6sNwgVXXNSk4UYUf55ffPWlcNwZJ4b1t9kkXHvrDdX2nlzF52onnXPKCK/WAYDhIeAAaEN+GDgwPPns06nKx72PPDDcS/Rz8chTj43QTdq7H7wXevf5LFVty1vvvh222mO7cPl1V7bIzXf8/4g3+pvuvFV46vnWeb3/9ttv4dJrrwgbbLdpuOH2m6uAp7nFMCUGOxtsu0l46IlH0tn8fNbn83DxNZelCgCajoADoI25/9EH0lE+Hnj0wXRUjgceHfEVGSX+OUfVfY88EHbef/fqpralxZVB+x9xcDjv8gvTmZYRV2lsu9eO1WqS1lip8F3/78Nhxx8RDjn28Oo4R9fdckP44OMPUwUATUPAAdDGPP3Cs1ks3f9TnB5R2o3Od99/F14eiS01Dzz2cDpqG2Izx6NPObbVt0VddeM14ehTj2uRVUL3P/pg2H7vnZp8K8rIePSpx8KWu22b5c9XfE3EbTWlrdwCIG8CDoA2ZsiQIeHhJ4ZvWklLuPeh4ZtCkpMYVMSxpiOq9+e9w3sfvp+q2vb6W2+Ek88+bbhuYEcfffQw12xzhg3XWj8cvOcB4YKTzwnXnHdFuO2Km8J9198V7rjy5nDDhVeH8048Kxy698Fhs/U2CfPMMXcYs9OY6b8wbP956L5q+0ZzuunOW8JRJx8Tfvl1xAKdLp07h1lmnDksu/jS1fdgq422CDttuUPYYfNtq6k26666VlhswUWrCUgj2kT02+++DbscsEc1sSY3cXLOjbfflCoAGHWmqAAUbkSmqPxpjllmD6cccUKqWk/8J2i9bTYKfft9lc4Mn9aeorL9PjtXfSVGRpykEieqtJaWmKLy408/hk122rLaItKYOOkk3tAvV3djP+4446azwy+GdY8/80S464H/hOdffiGdbdyJhx0b5p59rlQ1nStuuLpqIjq8ppp8yrD0oktW422nmmKqMPpoo6WvNO7nIT+HN95+Kzz29GPhkacerwKM4TFGxzHCEfsfGuadc550pukNzxSV/9WpU6dw6ekXhB7de6QzzcsUFYDaZgUHQBv06huvVg0JW1vc5jGi4UZr69P3i/D2e++kamhnHXtaWHuVNVM1tDgmtNafLcQtIcMKN5ZbYplwxdmXVKsTRibciDp27BiWWnTJcMKhx1Tf95mmnzF9pX4zTjdDFe41tTid6MIrL05V4+adY+5wxjGnhItOPa8Kd+KqjOENN6IYVMQRq7tus3O4/oKrwr4771UFU8MSg5FDjz+iVXqhNCY2Xz3hrFNSBQCjRsAB0AbFbQP3PdL6DS/vz+D3MKJic9GGAorppp62uslubHVJDHRee+v1VNWeOD73hjtuTlX94iqWA3bbN3TrOlY6M+ri9/2MY04N2226dWjXrl06+/917dI1/Guvg+r92qiIPWSOOe2EYYZWE4w3fjhy/8PC8YceE2aZYeZ0dtTEP8s/l/5HuOT0C6ptOx06dEhfqV/svXPQ0f+qVtjk5LmXnq+a0QLAqBJwALRR97fyDUXsUxBHrZbmgUaW4C+x8OLV56mnmCpMNmmv6rg+sRFlrYrfn8ZGoi407wLNtkUnroRYb/V1wtEH/jt0HrNzOvuHfXbaI0w0YdNug4irIg4+5tBhjr6NgcaFp5wbFp5/oXSmacW+HJutt3E49YgTw/jjjpfO1u/j3p+E4884KVX5OPPCs8OAHwakCgBGjoADoIaNVnfDFz/q8+EnH1UfreWp556qnvbXJzadzFF8Wv9x3Ud94vd56UWXSFUISyz0R9hRn0effGykmpSWoLEGtp3GGCPssd2uqWo+8801bzj2kCOr/79o9RVWqZp0NrXLr7tymFs+4u/l5H8fH8buNnY603ziKpazjz9jmEHOQ088Uq2ayMn3A/qHMy48O1UAMHIEHAA17NbLbwwLzD1/qoZ278OtN8Hk3ofrX0HSpXOXcOdVt1RTJXLT2DL6Gaad/m+NEpf6S9jxv+LN3LOZ3WA2hbj1qbH+JPFmf4LxJ0hV85p1xlnCUQceEbbYYNOwwxbbp7NNp8+XfcJ1t92YqvrNOO0M4fB9Dhnm1pGmNOEE3cNJ/z5+mH1NTrvgrBYd3xun5Fx7/pWNrjCJ70fPDWezWACoj4ADoIZ16jhGWG7JZVI1tDjxoDUaXsaVG8++9Fyq/m6xBRepxn92aN9yN4XD6+HHH0lHQ/tze8qfpug1eZhisilSNbQHanCbymeff9bodo2F52ueLRoNic04N1lno7rX0oiNVh0ecbVBnOLSkNjz4/D9DqmmhLS0nj0mDgftvl+jzUvjyOIbbmu5Ea1xy1CP7hOGHbdsPGw6+exTq60/ADAyBBwANW6RupvKuCqiPl993a+aZNLS4hL5hm4Ol1284UCmNb3xzpvVBJX6xO0pSy0y9JaUJRZaLB0N7Ylnn2r0BrlE3/X/Lh3Vb5KJeqajsr3/0QfhyeeeTlX9dtl6x9B9/O6panlxFO5ajUzzia6++brwyy+/pKplLLXIEtVKnobEn7GLrhz1UcUAtE0CDoAaF5fHL75Qw/0HWmN6QUMNTuPy+jlnbfoxnk2hscagM88wU703s3/tyfG/4iSLYd0kl+aHgT+ko/qN7DjY3Nx8563pqH5xa0ocg9vaNl134zDu2OOkamj9B/RvtGluc9lt253/rz9KfeIUnnc/eC9VADD8BBwAbcA/llw2HQ3t0aceryaatJS4auS1N+sfk7r0oks12BS1NcXeEo882fDElyX/Z3vKn3pN0quaqNKQWpum0n4Y24pqYetB3F71wOONhwJbb7xFOmpdXTp3DuutsW6q6nfrPbeno5YTt9BsvPaGqRrab7/9Fo4/86SabcQLQPMRcAC0AbPNNOvfGmD+Vbxhe/LZJ1PV/O57+P4qMKhPY/1CWtMLr7wYvv3u21T9Xexz8L/9N/6qsa/FPiSDfhyUqvKN3a1bOqrf9/2/T0fluvuB/zQ6Bjf2XYkNNXOx0rL/bLQPyFvvvt0qqyXiON/GetS89+H74dpbr08VAAwfAQdAG1CNMF1syVQN7d4W3KZyXwOrFqaZcuowZSM3PK2psYags840a6OTIWLPgYbEHhxxBU2tGNYo1HgzXbrHnn4iHdVv1X+slI7yEPvvNPYajB59quHVSc2lXbt2Ya/td2t0xdal11xeTasBgOEl4ABoIxrbpvLsi8+FHwYOTFXz+eDjD8PHn36cqr9bdvGl01Fe4vadx59peIXLkvU0F/2rSSbuGaabetpUDa01eiA0lx4TTNjoaoHSR+PGlRtvvftWqoYWV/M01u+mtSy2wCLpqH4vvPJSOmpZcRT0Cksvn6qhDf7553Di2aemCgCGTcAB0EZMPulkDd5ox0kKDz3xcKqaz70P3ZeO/m700UcPy2QacDz13NPVNp76xKfQjW1B+VNj01Reeu3l8F0NbN2I4vdjlhlmTtXQXnnj1aKbR770+suN9quZYboZwniNrOZpLfPMOXc1prUh73zwboOv8ea23WbbNNoINW4Pu+fBe1MFAI0TcAC0IY2tkmhsG0ZT+O9//xsefPyRVP1d7FnQ2DaP1tTYCovZZ54tjDOMbRnRUos2vD0oNlR86PHmD5daypyzND4F57Tzz6z+zCWKN9uNmWvWOdJRXtq3ax9mnG6GVA0tNvN88dXWWcUxVteuYfvNt01V/c66+Nzw/YD+qQKAhgk4ANqQZRZbqnrKXp9X33w99O33VaqaXlyp0O+bfqn6u/j7ylEc5frMC8+kamjD2p7yp4km7BFmmHb6VA3twcdqJ+CIK3HiDXVDXn/7jXDi2ac02Gg2Z2+80/D2lCiOC87VzNM3/nt7/e0301HLiyN1G2vMOuCHAeH0889MFQA0TMAB0IaMO864Dd5IxBUW9zVjs9F7H74/Hf1d7NmQY9+CKDaUjH0A6hNv4hdfcPh/3w2Nko3eeOfN0Ldf31SVrUf3CYcZ/Nx1/z1hv38fGPoX9lT+8z6fp6P6zTTdjOkoP9M30gcm+qzPZ+modey+3S6hY8eOqRpaXEn19AvPpgoA6ifgAGhj4tPShtzfTNtUYo+PhqZPLDzvgmHMTmOmKi+NbU+Zc7Y5QrexGh+L+ldLLrJEgxMjYrh0/yPNu0WoJW241vqhQ/uGV3FEsbHtBtttGq65+bpGx67mYsDAH6qPhsTXwrCmyLSmySbtlY7q9/kXrTutpFfPScMGa6ybqvqdfM5p4afBP6UKAIYm4ABoYxZbcJEGA4U44eT9jz5IVdN5/Nknw6AfB6Xq75ZtJHBpTXFZ/IuNTJdobEVGfSacoHujT/gfrKE+HFP0mjxstdEWqWpYfE2cc+n5Yc0t1g0nnX1qtX0l160rn33e+AqHOC0nZz0n6tno1qEvvvqyCtpa04ZrbVAFHQ2Jq5wuvPLiVAHA0AQcAG3MGB3HCIsusHCqhnZfA1tJRsX9DWx9iVtm5ptznlTlJQYOv/5W/8SMuDohBkUjaomFG56mUo3Q7f1Jqsq37mprhwXmni9VjRv044/htv/cEXbab7ew2sZrhkOP/3e47Z47wieffZp+RevrPYwtHBN175GO8hR778Sft4YMGTIkfPV18/XgGR7x52r37XZNVf1uuvPW8NZ7b6cKAP5OwAHQBjW2TeWBuhv7pnyK/sPAgeHZl55P1d8ttcgS1YjYHDXW+HPuOeYOXbt0TdXwi9tURm9gm0rU3JNsWtohex04zOaW/ytuA3n4iUfDSeecGjbdacuw2iZrhQOP/le47tYbwjvvv1tN/GgN337/bTqq3zhj57s95U9jd2t8S9W3332XjlrPXLPN0ej7U/z7P/6Mk4qdxANA8xJwALRBc80+V5hg/AlS9Xdff/N1eKkJR0Y++PhDVQ+O+jR2I9Oa4rSX1996PVVDi8HMyJhgvPHDzDPMnKqh1dI2lajzmJ3DiYcdO1KrXf4Ux4M+8cyT1ajQbffaMay04ephr0P3C1fdeE0VeLTUtoph9QkZZ+yGV0fkYpyxx0lH9YtTg3KwwxbbhW5dx0rV0D785KNw9c3XpQoA/j8BB0AbFFcRLN3ITXpTTlNpqHlmbHo4/TTTpSovsdlqQ6tY4qSHhedbKFUjrrEJI7HRY60tv49Tcg7f919h1613qo5HVbwJf/7lF8J5l19YBR5rb7l+1b/j1TdfS7+iefw0jICjS+fO6ShfncdsvJlvLs1ex+k2dth2061TVb/Lr7tymNuGAGh7BBwAbdRySy6bjob22NOPN7jqYkTEpoCxcWR9ll1s6XSUn8a2p8w75zyjdDMbm5M2ti2n1rap/Gn1FVcNV5x1SfhH3esu9oNoKl9/+03Vv2OXA/YIG+2wWbjh9pub5UZ9WP/NDh06pKN8tW/f+O/xx4wmlKy47D/DbDPNmqqh/Tzk53DiWaekCgD+IOAAaKOmnmKqMNXkU6bq72LTxzj5ZFTd+/AD9W4hiONSl1syz+0pvT/vHd778P1UDW1kt6f8KTZ6bOzGLfafyHWSyKiKW3T233WfcPmZF1WBx8j0MWnMZ30+D2dceFZYd5uNwg2339Rgk9iRMazxpO2HMRY3Bx2HEcIM/jmPFRx/2mP7XRsdN/zy66+EO++7O1UAIOAAaNOWXaLhVRRNMU2lodUIs844S+iR6dSJ+xrYUhN1GmOMsPC8C6Zq5DU2TSWuSHj5tZdTVZviyNK4ZeWmi68Nh+59cBUajdW16cKO/gP6hzMuPDtsvfv2VZ+OpvDbMJqbjj5a/pdUw2rom1vjzjhueJ3V1k5V/c659Lzw3fet3xwVgDwIOADasGUXX6bBm57nXnq+mmgxst794L0Gx54us/hS6Sg/DzXS6HO+ueZrkj4SSyy8eKPbNB549KF0VNtiP5MY9sRpK7deflM45/gzwjabbBXmr/s+d+ncJf2qkffRpx+HnfbbtdrCMqpiuNWYX34d9S1dzW1Y2846jTHqr+2mtuk6G1WBWEPilKZTzjsjVQC0dQIOgDYsbhmYY5bZU/V3v/z6a6M3+8PSUKPS2KtgyYVHbZtHc4mhTGONC0d1e8qfYhPF2WeeLVVDe/Tpx5p0e0UJYuPbGaadPmywxrrh2EOODLdfeXM478SzwvabbxsWmneBRqdqNCa+jmMT0kuuuTydGTljdmq8Qeevdf8/uRsyjIBjzCYI75paDMF222anVNXvkScfDU88+1SqAGjLBBwAbVxjo1pHdppK7CHRUDiywNzzNel2hKbU2J833uDGG+2m0tg0lfhU+pkXnktV2xQDj+mmnjasu+pa4agD/x1uvfzGcMHJ54RtNt4yzDnrHCPcqPSSay4LN995a6pG3LBW7gz++ed0lK8hQ4ako/oNK8RpLfPNNe8ww8VTzj09mzG3ALQeAQdAG7f4Qos2ePP2xttvhi+/6puq4ffiKy9WvSTqE7fF5Cg2Q40NPhuy4LwLVE+Tm8riCy4a2rdruIFirU5TGVmxMe00U04dNlhzvXDyv48PN158bdXHY8rJpki/YtjOuOjskR7DO6ztG7HvR+4G/DAgHdVvzGGMkW1NO225faPblvp90y+cd9mFqQKgrRJwALRxf6xMqL9xZrzpH5lmow2thIgrNxaar+lWQTSlV998rbpJakgc79qUuo3VLcw5a/3bg6Inn3+6Wcad1oq4zSdOYrn4tPOrLS1xtcewxCaax5x6fPh9GA1D6zOsiS8lBBz9f2j899gUfU+ay3jjjhe23niLVNXvtntuD2+882aqAGiLBBwANLpN5f4RXEkQl8E/9vQTqfq7JRZavNFVC62pse0pXTp3rrbWNLUlGtmmEsONphjV2xbEpqTnnHBm1aB0WFtXPvns03Dn/SM+WrTnRBOlo/o1tGIpJ41NG4krZHr2mDhVeVp1+ZXDjNPNkKqhxa1xx59xUpvrXwPA/yfgACDMN+c8Ydxxxk3V38Ubwth8c3g9/swTDe6FX27JPLenxCf7jz71eKqGFle4xOaoTW2xBRYNHdo3tk2lbUxTaQqxZ0dsUHrUgYcP8+/q+ttuTEfDr1fPSdNR/fp80Scd5SmGG4N+bLhHxfjjjd8kE4KaUwxh9tph90ZDrDi56Yrrr04VAG2NgAOAalRsY0387h2BbSr3NrASYuIeE4VZZ5wlVXl59qXnGu1P8N6H74d9Dj+gyT/+fdJRoX37hm/Gn3/5+arhKMMvrubYc/vdUlW/Tz/rHd56d8R6cUzUY+JGg5Mv+/XNeuXAp583PB0omqSRUaw5mXqKqcJaK62eqvpdeePVVTALQNsj4ACg8o8ll01HQ4sTUeLy72GJIcELL7+Qqr9bZrGl0lF+7n+k8W048anwsy8+1ywfPw3+Kf2/DC2OOH34yUdSxfBafqnlwjxzzJ2q+j353IiNFY0rRCaasOFtKrGvx4cff5Sq/Hz4SeO/t0knniQd5W/z9TcNPbr3SNXQfvnll3DCmSdXPYQAaFsEHABUYpPGySedLFV/981334YXXnkxVQ174LGHq5vy+jTW56M1/Tzk57qb3adTlZ8H676njLh1V1s7HdVvZJpRTj3FlOmofq+//UY6ys+bw/jzTjWMP1tO4laaXbbeMVX1e+2t18Nt/7kjVQC0FQIOAP7PMosvnY6GNjzTVO5vYHvK9NNMF3pN0itVeXnimScbXUXR2l55/ZUqYGLEzD3bnI1OPvno00/S0fCba9Y501H94iSeXL3xzlvpqH7DWvGSm4XnWzAsMv/CqarfeZddUETzVwCajoADgP8TV1nERn71efyZJ6sJKQ3p0/eL8Oa79d9ELbt4nqs3ogcey7uRZ9wa9MAITrKh7gJn9NHDtFNNk6qhfd//+2orw4iYZ87GQ4DnXnqhalibm96f9w59vmy4CeoE40/Q4OqtnO22zU6h85idUzW02FT1lHNPTxUAbYGAA4D/06P7hGG2mWZN1d/FySiPPVP/+NfovocfqHfPe5x4sPRiS6YqLwMHDQzPvvR8qvL14OO2qYyM2Ni2IfG1Gv/+R0Qco9rYKNVBPw4KL776Uqry8fCTj6Wj+sXVLiWKwcwWG2yaqvrFqU6PPtX4nx+A2iHgAOBvlm1sm0oDW1Ci+xtYZTDP7HOHccceJ1V5eaTuxq+xp/hxsszqK67aIh9xOkRD3n7vnfB55mNIc9TY0/2ooX4xjRnWKo677r8nHeVjWCuA5ptr3nRUnjVWWr3qH9SY084/swqfAKh9o/1Xi2mAoq21xXoN7jO/97o7Q8eOHVM1fOKNwBqbrVs13/xf7du1DzdefE0Yu9vY6cwf3nn/3bDtXvU3/Ttoj/1HaoLK7gfvHV567eVU/d1+u+xdTcoYVXscsk+DT9zH6to13Hzp9dWfuSXEVRqHn3BkqoYWn1Rvss5GqRp5h594VHiwgW05k/acJFxx1iWpKt/xZ54U7rzv7lQN7fYrbq7+nkdEHBm89R7bp2poHdq3D9eef2UYb9zx0pnW9dzLL4S9D90vVUPrNla3cONF1zQ6And4Nfbaiv0yjtj/0FQ1rfj+s/0+O1eTbBqy8nIrhj132C3c8+C94ZjTjk9n/y4GsfFnHoByWcEBwN906dwlLDDP/Kn6u19/+7XeqR73NtCAdMxOY4ZFF2i8EWBr+fa7b8PLr7+SqqHFG7KWCjei2DQxTodoyAOP5t0r5K/itoDt9t6pmmTRmmKfjYbEXjNdunRJ1fCLfT1mmn7GVA0trgq58sZrUtX6rr6p8d/LCsss3yThRmuKTYxX/efKqarfHffdVYWZ/Qf0T2cAqEUCDgCGslwj21T+dytKbIL50BOPpOrvFltwkTBGxzFSlZe4YqKxJ75xe0pLit+nBeaeL1VD++SzT8MHH3+YqnzF3+ORJx9bbauJT8oHDx6cvtLyvvyqbzoa2njjjBtGb6Ch7rCs9s9V0lH9brvn9kaberaUGDS9+Gr9q6Ci+Ocf1p+lFFttuEXVk6MhccFyXLF19iXnpTMA1CIBBwBDiSs4/ncbyp/ipJS/3rw9/9Lz1WqI+jTWz6O1NTY9Jf7Z5559rlS1nCUXXjwd1e/+R/KepvL9gP7hwKMO+b+xu7FvyJkXnVMdt7Q4WvfDTz5K1dCmmnzKdDTillxkidB9/O6pGlpcxXHs6SfW23S3pfwwcGA4/YKzU1W/heZbKEw0YY9Ula1L585h5y0b3joEQNsg4ABgKHHySUM32/Gm7b6/3Gg31Hh0gvHGD3O1QkgwPOJI27fefTtVQ4vbauKY0Za24DwLVNt6GpLzNJW4femQYw4batXE7ffeGa699YZUtZxHn3q80YBhummmS0cjLvbZ2G6zrVNVv1feeDVccf1VqWpZ8c999KnHhr79Gl7BEnvz7LD5NqmqDYsvtFijq6AAqH0CDgDqtdwSy6Sjod2fQo3YiPTxZ56sjv/X0osuOdJbAJrbA8NYCdHS21P+FG86F5x3gVQNLd6wvv7WG6nKy0lnnxpeffO1VP3duZec12CfluYQX5dXDaMPxiLzLZSORk58fc8+c/0jlf900dWXtuif+08nn3taePK5p1NVv3VWWTP0nKhnqmrH7tvt0mgvGwBqm4ADgHrFRopxqkZ9evf5rOqxEJ+S/7kd4X8tt+Sy6Sg/DzSyEmLcccYNc8w6R6pa3jC3qQxj5GdriIHCk88+laqhxT4tR596XLjyhqvTmeZ1ydWXh37f9EvV0Hp0nzDMON0MqRp5u2y9U7XaqSFxJcVxp5/Y6CSXpvTbb79Vk2Nuu+eOdKZ+E07QPWy01gapqi09uvdokmlDAJRJwAFAg5ZZrOEeGnEk5LmXnp+qv5tysinC1FNMlaq8xL4MH3/6caqGttgCi7TqypO4xD72E2jII08+2mhz1NYQG6RuseFmqapfvNk//4qLqtfNgB8GpLNN7+a7bgtX33xtquq3+gqrpqNRE1/j22y8ZarqF7fuxNDhtPPPDEOGDElnm15c3RNHKw8rTInbaw7e84CaXuWw7qprjVKPFQDKJeAAoEHLLblMNU6zPrHR6NfffpOqv1u2ke0tre3P7TUNWWrRJdNR64gjO2MvjoZ81//78MIrL6YqH6v8Y6Uw/1zD7n/w4GMPhU123CLc8+C9TRrUxMae511+YTj9/DPSmfrFBrJNOTlk3dXWrrarDMtNd94Stthtm2qySVOKU2quuunasOnOWzW4ReivdtpqhzDrjLOkqjbFVTV77rBbtlvkAGg+Ag4AGtSzx8Rh5ulnStXwiTcVjY2ZbW0NjbSNYmPU2WZq/Zu/OKWjMTluU4kO3H3fBrc1/VWcthJHyG6w3SbhhttvDgMG/pC+MuJisBH/Trfefbuq70bcDtOY7TfbpslXL+yz855h2qmmSVXDPuvzeTjo6EPDlrttG2695/ZRWsnyce9PwgVXXBTW3WajcN5lFwzXON4Vl/lnWHX5lVNV2+L71orLrpAqANoKAQcAjVp2iRELK2afZfYwwfgTpCovr7/9Rvii75epGtpiCy7a4IqVljT/3POGLp27pGpocRXAL7/8kqp8dBurWzjh0GMbHaH6V3HiyhkXnhVW22StsMsBe4TLr78qPP38M6Fvv6/Srxha7DPxwccfhrvuvyeceNYpYc3N1w2HHX9EdcM/LIvMv3BYfqnlUtV04hadEw87Nsw47fD19Yi//5PPOS2ssdm6Ycd9dw1nX3xuNY3ojXferFZFDfrxx2p1Swxv4rjX+H168dWXq4k0x51xYth4xy3CZjtvFa644erQf0D/9F9t3ArLLB/23HH3VLUN2266VdVTB4C2Y7T/NjZDDYDsrbXFeg1uFbn3ujuryRyjIt5grbH5OsN9Q73PTntWN1OjKvYTeOm1l1P1d/vtsvdI3aieet7pVY+GhpxxzClhlhlmTlXrOuqUYxudwHH4vodUgcyIij0w4jaR+sTVF1ecdUmqRl4MKPb6175VM9qRFbfqdB6zc93HmKF9u/bhx59+DIPqPn7++edGx782ZLqppw0n//v4RoOjURUb7h58zGHh+ZdfSGfysP7q61Y3+82tsddWDJeO2P/QVLWcGBwdefIxqWrcuGOPE26+9PpUAVAiKzgAaNRYXbuG+eaaN1WNi0+yF19osVTlJW5dePjJx1I1tDhZY0S34zSnJRcZ1jSV+m8kcxC/l2cdd3pYeL4F05kRFwO1uDohrriJQck3331bbcMYmXBjmimnDiccdmyzhhvRmJ3GDMccfERYfYVVslgJFH8/e2y/a4uEG7ladvGlwzxzzJ0qAGqdgAOAYfrHcDYNXXDe+RudANKaXnj5hfDd99+lami5bE/507xzzlOFSw155oVnq1UNuYq/9yMPODzssd2ujf45mts/llw2nHnsqaFb17HSmeYVV5vsus3O4ZQjTgiTTNwznW15c802R7j4tPOr5q9t3e7b7lKFrwDUPgEHAMO04LwLDtdN6nJLLJuO8vNAA0vn/7TUoo039mxp8UZ54fkWStXQfh7yc3j0qcdTla9Vll+p2vayxoqrhU5jtNxN5oQTdK/Goe6/6z6tcnM7+8yzhYtOPS9stt4mVW+SltKr56TVFq6TDj8+TDRhj3S2bYtB04ZrrZcqAGqZgAOAYerQvv0wt57E8ZvzD+dWlpYWmzU+9nTD4zkn7jHRcDeIbEnD2qYyrNAmF/G1scvWO4arz7sibLzOhlX40Fxig9OtNtqiClWGZ3xrc4rBymbrbRyuO//KsNOW24ce3ZsvcIiv38P2OThcduZFzdJItXQbrLlemGzSXqkCoFYJOAAYLnGpf2OWXHjx0K5du1Tl5annng6DfhyUqqHl2jdkntnnbvTp/4uvvlSNXC1FbOK45QabhWvqbvhPOPSYsPqKqw7XWNlhiZMy4uvvyP0PC9decGXYaK31R7m5blOKY2nXWnmNcM15l4ezjj2tavrZa5JRu9mO45hjQ9zYXyOGOWcff3r1Os5pm1VO4oqoPbffzfcHoMaZogIAtKpvv/s2vPPBu+H9Dz8IX3z1Zej3db/w7fffVdtwhgwZUo2GHWOMTtUWl9g4M44hjtsOJp14kjDjdDOEKSebIv2XyhL/3HFk7IeffFR9xEaqgwYNCoN+GhR++mlwGH300cKYY3YOXTt3CZ07d662nEw1+ZRh6immqvs8Vbb9bgCgtQg4AAAAgOLZogIAAAAUT8ABAAAAFE/AAQAAABRPwAEAAAAUT8ABAAAAFE/AAQAAABRPwAEAAAAUT8ABAAAAFE/AAQAAABRPwAEAAAAUT8ABAAAAFE/AAQAAABRPwAEAAAAUT8ABAAAAFE/AAQAAABRPwAEAAAAUT8ABAAAAFE/AAQAAABRPwAEAAAAUT8ABAAAAFE/AAQAAABRPwAEAAAAUT8ABAAAAFE/AAQAAABRPwAEAAAAUT8ABAAAAFE/AAQAAABRPwAEAAAAUT8ABAAAAFE/AAQAAABRPwAEAAAAUT8ABAAAAFE/AAQAAABRPwAEAAAAUT8ABAAAAFE/AAQAAABRPwAEAAAAUT8ABAAAAFE/AAQAAABRPwAEAAAAUT8ABAAAAFE/AAQAAABRPwAEAAAAUT8ABAAAAFE/AAQAAABRPwAEAAAAUT8ABAAAAFE/AAQAAABRPwAEAAAAUT8ABAAAAFE/AAQAAABRPwAEAAAAUT8ABAAAAFE/AAQAAABRPwAEAAAAUT8ABAAAAFE/AAQAAABRPwAEAAAAUT8ABAAAAFE/AAQAAABRPwAEAAAAUT8ABAAAAFE/AAQAAABRPwAEAAAAUb7T/1knHtDE/D/k59Pnyi+rji75fhP4D+oeBPw4KP/30U/ix7uOnn34Mg3/+OQyqO/dj3fFPgwdXv+ZPncfsHNq3bx861H20b98hdOjwx+eOHTpU58foOEboPv4EYeIeE9V9TFx9nmjCiUKP7hOm/wLQVL7r/33dz3Kf8H3//tXP7MBBA8OgQX98jj/Xf5yr+xzP/fn1us9DhgwJY3cbO3Tp3CV07RI/ulafY/3HuT/q+DnW3cbqVv0sTzhB9/T/DADUkvc+fD98+/23f7lmSNcRA/+4dvjjfuHHMOCHH/7v+iLeK/x5LRE/j9V1rOpe4Y9riP9/TdElXVOMXXc9Md6444Upek2e/l+haQg42oDX334jfNbn8yrE+DPQ6FN3/N3336Vf0fJ6TtSz7mPiMPGEE4VJJ5k0TDfVNGH6aaar3giB+sUwonefz8Knn/cOn33+WXUcPz6r+/ih7qKjJXUaY4wwac9JQ6+6j/gzPNkkverqScLkk07m5xgAMvZ73e3fl199WV1LfFr3Ea8j/rye+OrrfqElbw9HH330MFH3HqFX3XVEr0kmqa4t/rimmLR6UDraaKOlXwnDR8BRY+JT3NfefL0KNeLHex+8F3759df01bzFN7AYekw/9XRh2qmnqT7H0CMmvtDWxMDikScfDe9++F7oncKMr7/5On01b3FFSK9J/gg/pp5i6rDEQouGCeouUqC1vfz6K+kob/HCfoLxxk8VwyuuTHv/ow9S1fqmmnzKatUbtLbnX34hvFT3/vdx70/qril6h08/652+kreOHTuGSSeepAo/ppxs8jD37HOFWWecJX0V6ifgKNwHH39YBRmvvvFaePPdt8IXfb9MX6kdE03YI8wxy+xhoXkXDPPNNW/15BhqUd9+fcMjTz4Wnnj2yfDaW2+E33//PX2lfFNPMVVYeL6FwiLzLxSmm3radBZa1hKrLZuO8hZ/Rs494UxPLkfQS6+9HHY/eO9Utb6jDvx33bXLAqmClvPT4J/CU88/E5545snw9AvPVttIasU43cYOC823YHVNMc8cc1Vb4uGvBBwFik9xb/3PHeHu++8JX3/7TTrbNsQkd+7Z5qpukuJHfFIMJXv7vXeqQOPxuouQjz79OJ2tbXE1x8LzLlj9DM852xyhfbv26SvQvEoJOKJdtt4xrLHiaqlieAg4aMvi1vNHn368up54ue5noZQV3KMihhsx5IiBxyLzuS/gDwKOgsQE9uY7bw3PvPhsOsMsM8xcXTwsucgSVeNDyN2vv/0aXnr15fDYM0+EJ597uphtJ80l9uuYb655qicx8WfZljSaU0kBx5idxgxXnn1J1YSP4SPgoK2JD0ZioBEflLzz/rst2jsjN6OPNlqYcboZw8LxIWjdNcVkk/ZKX6GtEXBkLk4tufWe28Od990d+vb7Kp2lPvEiYq2V1wxzzTZHOgP5iD01brzj5nDzXbf+bRoR/1+cyLTsEsuEDddcP0wycc90FppOSQFHtNiCi4bD9z0kVQyLgIO2IDYIffiJR8K1t1xfhRrUb+bpZwobrLFutbrDdr+2RcCRqdgo65qbr6u7Ibql2kfH8It7/ddcafWw7OJLhw4dOqSz0DpiX42rb7ou3P3Af6rRzAxbvBCJKzo2XnuDqtEwNJXSAo7o+H8dHeadc55U0RgBB7UsXkPcdd894brbbqjJnnvNJa7kWH/1dcOySyxtS2wbIeDITAwzrrv1xrqPG2qqIVBriPvwVvnHimH1FVa1xJcWF2fIX3HD1eGxpx6rnrYwcmabadawwZrrhQXmni+dgZFXYsDRffzu4YqzL9ZIbzgIOKhFA34YEG64/eZwy123hgEDf0hnGVFxMtXaq6wZVll+pWoLILVLwJGJwT//HG664+Zq1YY3r6YVV3Gss+paYeO1NzSBhWb31PNPVz/Hr7zxWjpDU5hysinC+musG5ZedMnQrl27dBZGTIkBR7Te6uuE7TbdOlU0RMBBLenT94twzU3XhXseujcMGTIknWVUxV5fq/5z5ereIE5kofYIODIQ5/IfcdLRbW4iSkuLkxviBeIyiy2VzkDTefiJR8OFV14cevf5LJ2hOYw/7nhho7U3DKuvsEo6A8Ov1IBj9NFHDxeecm4V9NEwAQe1IAYb5112QXVdQfOKqzm23GAz01dqjICjFQ0ePDicedE54fZ770xnaAkzTjdD2HenPcMULhRpAt989204/syTwtPPP5PO0BJib44Ddts3TD7pZOkMDFupAUc03dTThnNPOFOzvEYIOCjZ77//Hq666dpw2XVXWLHRgrqN1S3suMV24R9LlvvvA383evpMC3v9rTfCJjttIdxoBW+9+3bYYtdtwknnnGo7ECMtZsNxbPPGO2wu3GgFsXP8lrtuGy666tI2Mesf3v3gvXDbf+5IFVBL4r9pW+2+XbjgiouEGy0s9jg5+tTjqnA0NoanfAKOFhY7IJ92/plh5wN2D1993S+dpaXFpo+33XNH2KTu5vT1t99IZ2H4fPLZp2G7vXcKp55/Rvjxpx/TWVrar7/9Wj3p2nyXrcKb77yVzkLtOueS88O3332bKqB0cTX3GReeFbavu6b48JOP0llaQ1wBtulOW1bjdzWHL5uAowXFlQPxB+emO2+pnv7S+r4f0D/scsAe1ZJAGJa4UuDCqy6pVg6YPZ+Pz/p8Hnbcb9dqVZbAiVoWJ62dceHZqQJK9tzLL4SNd9yimpDihjoPcejD2ZecF7bZY3uBU8EEHC0kNgracd9dwpdfWfqUm7jnMTZz2vfwA43mpUFxhUBcKXD5dVdWKwfISwyN46osW4aodQ8+/nDVnBwoU/8B/cPhJx4V9j50v9DvG6u5c/T+Rx+ErffYPpx76QXV6nvKIuBoAXfdf0847IQjpLOZe+bFZ6veHBJb/lcc+xpXCMSVAuQtNn3d74iDqqfcVspRq449/YTwyy+/pAooxQcffxg222Xr8OBjD6Uz5Oq3334LV998bdh2r51sDSyMgKOZ3XrP7eG4M050oV2Ivv2+qnsj2zHcce9d6QxtWQwlTzjr5HDOpef7GS7MDbffFA465lDN2qhJX/T9Mlxy7eWpAkrw3EvPV6u5v/v+u3SGEnz86cdVyBE/UwYBRzOKF9gnn3NaqihFfCoWb2rPu/zCdIa2KN4Y73v4AcKugj3xzJNVQ2fTkqhFcWVZ7897pwrI2X8euq+6pog9HihP3Eq0w767hlfeeDWdIWcCjmYSRxdqBFa2q268RsjRRsX9sTvtv1v1tIWyxWaw2+21U+jzZZ90BmpDXD59zGknpArIVezzFseQ2qpettjEfM9D9g33PfJAOkOuBBzNIM6pj6MLKZ+Qo+3p3eezsM2eO4R3P3gvnaF0MdyIIYfJN9SaN9550yozyFScvHbIsYeZ1FdDYpP5I08+xn1e5gQcTSw2Dzr9grNSRS2IIccl19jr3BbEUc7xRjj2YqG2xG0qcbtK3LYCtST2CBrww4BUATmIU/l2qfs359GnHk9nqCVxpX7ssRgnMZIfAUcTivPpDzjyEJ3Na9Al11xWBR3UrngREi9GjAquXbGvysHHHFr1R4JaMXDQQA9WICPxIUl8WBIfmlC74pTMvQ/bv9q6Ql4EHE3o6FOPr3tT65sqas3l11/l5rdGxfDqX8cdXi0npbbFPdCxP1JsAG0yDrUi7gl/+fVXUgW0lriSO25zjdtdqX0vvPJi1XzUGNm8CDiayC133xYefeqxVFGLDtht39Clc5dUUSvi0/zYZ8XNbtsSR3ifc8l5qYLyHXv6CVaQQiuK45vjStDYqJy2I46P3e3gvaqV/ORBwNEEPu79STjl3NNTRS1aebkVw6ILLJwqasVLr70czrronFTR1lx76w3h/kcfTBWULd5cxZWGQMuLN7f7HLZ/GPSj7Qpt0aef9Q6HnXCkh2WZEHA0gbMuPjcdUYsm7TlJ2HmrHVJFrYg3Awcd/S9j29q4+NTbxBxqxZU3Xh16f947VUBLiNcRhxx7uG0pbdzTzz8TLr76slTRmgQco+iVN14Nz774XKqoNR07dgxH7Hdo9Zna4UkLf4pL+g848uBqygqU7rfffgvHnHZCqoCWcMHlF4bnXno+VbRlcXysyTmtT8AxCuIypNiojtq105bbhykmmyJV1IL4c+tJC3/19bffhIPjah7j3qgBb7zzZrj7gf+kCmhODz/xaLjqpmtTBSEcdcox1ZYVWo+AYxTc9cA9Vf8NalPsubHKP1ZKFbUijvz1pIX/9cobr4XTzj8zVVC2My86Jwz4YUCqgObw/kcfhCPrbmbhrwb//HPY74iDTF5sRQKOkRRfvOdfdmGqqDXdx+8e9t91n1RRK5549qlw6bVXpAr+Lk7D8uSbWjBw0ED9waAZfT+gf9j38ANMLqJefb7sU60W1uetdQg4RtI1N19XvbnVsjE7jRnG6TZ26NF9wtCr56Rh6immCjNNP2OYbaZZw7RTTRN6TdIrTDhB99BtrG5hjI5jpP9VbThsn4ND5zE7p4paEFdbHX7CkamC+p141inhzXfeShWU654H7622qwBN69fffg37/fvA8M1336YzMLQXXnkxnHvp+amiJY32X/NsRsqKG6xWE0uP4kqFyXtNFiafNH3UHU9W93ncscdJv2LE9O33Vfjq66+qCRVffhU/+laf33n/3WIaOm6z8ZZhgzXXSxW1YotdtwkffvJRqmpb/PntOVHPuo+JwyQTT1L30bMKI2No2WmMTqFTpz8+unUdq/r18Wnv4MGDw08/D64+D6773O+br8MXX34RPv+yT/j8i8/rPn8Rvq471xb06N4jXHu+lT61aInVlk1HbUN8EHHJaeeHdu3apTO1LY7+3v3gvVPV+o468N9hoXkXSBW1IjaSvOiqS1NV2zqNMUa6nuhZTRWcuMdE1XHXzl3+uJZI1xRjps+xiftfrydiHa8xPuvzeXVv8Fmfz6rribY07emUI04Ic8wye6poCQKOkRC74x5y7GGpKsvoo40WZpt5trD4QouFxRdcJIw37njpK80rvsw+rXsze+PtN6snSvEJ6Se9P8lu6dasM84STjvqpDBa3feJ2nH9bTdWe9JrUXytTjX5lHU/17OGOep+tuecbc7/Cy6a2o8//VhNjnr59Verz3G8aq025tx47Q3ClhtunipqRVsLOKLN1980bLruRqmqbQIOmttXX/cLG26/ac1uTYn3BfFa4s9riuZqtB+vHd754N3wSt31xMt11xOvvfl6zfasiEHzxaedF9q3a5/O0NwEHCPh4GMODY89/USqyjB73RvVsosvUzXOHLvb2Ols6+o/oH94/NknwwOPPhRefPWldLb1xO/Lxaee12KhDy3j2+++rbsY2ax6ilAr4vaphedbsPp5nnv2uUKXzl3SV1pW/J6+/Por4fGnnwyPPv1Y+GHgwPSV2nD5WRdX2/OoHW0x4OjQoUO47IyLqievtU7AQXM78KhDqn5etSRuPY/XE/POMXerTg586723w1PPPVN3j/V4+OjTj9PZ2mB1eMsScIyguMxqpQ1XT1X+5px1jrDlBpuFWWacOZ3JU7wxeuLZJ8O9D98XXnz15XS2ZR3/r6PDvHPOkypqxZEnHxPue+SBVJUrhhpL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AABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAAAAEDxBBwAAABA8QQcAAAAQPEEHAD8v3bsgAYAAABhkP1Tm+MbxAAAAPIEBwAAAJAnOAAAAIA8wQEAAADkCQ4AAAAgT3AAAAAAeYIDAAAAyBMcAAAAQJ7gAAAAAPIEBwAAAJAnOAAAAIA8wQEAAADkCQ4AAAAgT3AAAAAAeYIDAAAAyBMcAAAAQJ7gAAAAAPIEBwAAAJAnOAAAAIA8wQEAAADkCQ4AAAAgT3AAAAAAeYIDAAAAyBMcAAAAQJ7gAAAAAPIEBwAAAJAnOAAAAIA8wQEAAADkCQ4AAAAgT3AAAAAAeYIDAAAAyBMcAAAAQJ7gAAAAAPIEBwAAAJAnOAAAAIA8wQEAAADkCQ4AAAAgT3AAAAAAeYIDAAAAyBMcAAAAQJ7gAAAAAPIEBwAAAJAnOAAAAIA8wQEAAADkCQ4AAAAgT3AAAAAAeYIDAAAAyBMcAAAAQJ7gAAAAAPIEBwAAAJAnOAAAAIA8wQEAAADkCQ4AAAAgT3AAAAAAeYIDAAAAyBMcAAAAQJ7gAAAAAPIEBwAAAJAnOAAAAIA8wQEAAADkCQ4AAAAgT3AAAAAAeYIDAAAAyBMcAAAAQJ7gAAAAAPIEBwAAAJAnOAAAAIA8wQEAAADkCQ4AAAAgT3AAAAAAeYIDAAAAyBMcAAAAQJ7gAAAAAPIEBwAAAJAnOAAAAIA8wQEAAADkCQ4AAAAgT3AAAAAAeYIDAAAAyBMcAAAAQJ7gAAAAAPIEBwAAAJAnOAAAAIA8wQEAAADkCQ4AAAAgT3AAAAAAeYIDAAAAyBMcAAAAQJ7gAAAAAPIEBwAAAJAnOAAAAIA8wQEAAADkCQ4AAAAgT3AAAAAAeYIDAAAAyBMcAAAAQJ7gAAAAAPIEBwAAAJAnOAAAAIA8wQEAAADkCQ4AAAAgT3AAAAAAeYIDAAAAyBMcAAAAQJ7gAAAAAPIEBwAAAJAnOAAAAIA8wQEAAADkCQ4AAAAgT3AAAAAAeYIDAAAAyBMcAAAAQJ7gAAAAAPIEBwAAAJAnOAAAAIA8wQEAAADkCQ4AAAAgT3AAAAAAeYIDAAAAyBMcAAAAQJ7gAAAAAPIEBwAAAJAnOAAAAIA8wQEAAADkCQ4AAAAgT3AAAAAAeYIDAAAAyBMcAAAAQJ7gAAAAAPIEBwAAAJAnOAAAAIA8wQEAAADkCQ4AAAAgT3AAAAAAeYIDAAAAyBMcAAAAQJ7gAAAAAPIEBwAAAJAnOAAAAIA8wQEAAADkCQ4AAAAgT3AAAAAAeYIDAAAAyBMcAAAAQJ7gAAAAAPIEBwAAAJAnOAAAAIA8wQEAAADkCQ4AAAAgT3AAAAAAeYIDAAAAyBMcAAAAQJ7gAAAAAPIEBwAAAJAnOAAAAIA8wQEAAADkCQ4AAAAgT3AAAAAAeYIDAAAAyBMcAAAAQJ7gAAAAAPIEBwAAAJAnOAAAAIA8wQEAAADkCQ4AAAAgT3AAAAAAeYIDAAAAyBMcAAAAQJ7gAAAAAPIEBwAAAJAnOAAAAIA8wQEAAADkCQ4AAAAgT3AAAAAAeYIDAAAAyBMcAAAAQJ7gAAAAAPIEBwAAAJAnOAAAAIA8wQEAAADkCQ4AAAAgT3AAAAAAeYIDAAAAyBMcAAAAQJ7gAAAAAPIEBwAAAJAnOAAAAIA8wQEAAADkCQ4AAAAgT3AAAAAAeYIDAAAAyBMcAAAAQJ7gAAAAAPIEBwAAAJAnOAAAAIA8wQEAAADkCQ4AAAAgT3AAAAAAeYIDAAAAyBMcAAAAQJ7gAAAAAPIEBwAAABC3HXTijXoAjVQEAAAAAElFTkSuQmCC';

            const pdf = new jsPDF('p', 'pt', 'a4');
            const pdfWidth = pdf.internal.pageSize.getWidth();
            const pdfHeight = pdf.internal.pageSize.getHeight();

            const imgProps = pdf.getImageProperties(imgData);
            const imgWidth = pdfWidth;
            const imgHeight = (imgProps.height * imgWidth) / imgProps.width;

            let position = 0;

            while (position < imgHeight) {
                // Tambahkan bagian gambar untuk halaman ini
                pdf.addImage(
                    imgData,
                    'PNG',
                    0,
                    -position,
                    imgWidth,
                    imgHeight
                );

                // Tambahkan watermark di tengah halaman
                pdf.setGState(new pdf.GState({
                    opacity: 0.1
                }));
                const wmWidth = 300;
                const wmHeight = 300;
                const wmX = (pdfWidth - wmWidth) / 2;
                const wmY = (pdfHeight - wmHeight) / 2;
                pdf.addImage(watermarkImg, 'PNG', wmX, wmY, wmWidth, wmHeight);
                pdf.setGState(new pdf.GState({
                    opacity: 1
                }));

                position += pdfHeight;

                if (position < imgHeight) {
                    pdf.addPage();
                }
            }

            pdf.save("laporan-analytics.pdf");
        }
    </script>

@endsection
