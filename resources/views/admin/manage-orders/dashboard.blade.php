@extends('admin.layouts.app')

@section('content')
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
