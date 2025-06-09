@extends('admin.layouts.app')

@section('content')
    <div class="container mx-auto p-4 bg-[#dcd7c9]">
        <h1 class="text-3xl font-bold mb-6">Dashboard Admin</h1>

        <div class="flex mb-4">
            <button onclick="printDashboard()" class="bg-red-600 hover:bg-red-800 text-white py-2 px-4 rounded">
                Export PDF
            </button>
        </div>
        <div id="analytics">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded shadow">
                    <h2 class="text-xl font-semibold">Total Pesanan</h2>
                    <p class="text-4xl font-bold">{{ $totalPesanan }}</p>
                </div>
                <div class="bg-white p-6 rounded shadow">
                    <h2 class="text-xl font-semibold">Total Pendapatan</h2>
                    <p class="text-4xl font-bold">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</p>
                </div>
                <div class="bg-white p-6 rounded shadow">
                    <h2 class="text-xl font-semibold">Total Pelanggan</h2>
                    <p class="text-4xl font-bold">{{ $totalPelanggan }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Chart Pesanan Per Bulan -->
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-xl font-semibold mb-1">Pesanan Per Bulan</h2>
                    <div id="chartPesananPerBulan"></div>
                </div>

                <!-- Chart Status Pesanan -->
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-xl font-semibold mb-1">Status Pesanan</h2>
                    <div id="chartStatusPesanan"></div>
                </div>
            </div>

            <div class="bg-white p-4 rounded shadow mt-6">
                <h2 class="text-xl font-semibold mb-1">Tren Penjualan 7 Hari Terakhir</h2>
                <div id="chartTrenPenjualanHarian"></div>
            </div>
        </div>
    </div>

    <!-- ApexCharts CDN -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <script>
        // Chart Pesanan Per Bulan
        var optionsPesananPerBulan = {
            chart: {
                type: 'bar',
                height: 250,
                width: '300'
            },
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
            chart: {
                type: 'pie',
                height: 250
            },
            series: @json($statusPesananData),
            labels: @json($statusLabels),
            legend: {
                position: 'bottom'
            }
        };
        var chartStatusPesanan = new ApexCharts(document.querySelector("#chartStatusPesanan"), optionsStatusPesanan);
        chartStatusPesanan.render();

        // Chart Tren Penjualan Harian (Line Chart)
        var optionsTrenPenjualanHarian = {
            chart: {
                type: 'line',
                height: 250
            },
            series: [{
                name: 'Penjualan',
                data: @json($trenPenjualanHarian)
            }],
            xaxis: {
                categories: @json($tanggalLabels)
            }
        };
        var chartTrenPenjualanHarian = new ApexCharts(document.querySelector("#chartTrenPenjualanHarian"),
            optionsTrenPenjualanHarian);
        chartTrenPenjualanHarian.render();
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
