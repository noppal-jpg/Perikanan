@extends('layouts.argon')

@section('title', 'Laporan')
@section('page-title', 'Laporan')
@section('breadcrumb', 'Laporan')

@push('head')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Statistik Pelaporan Mingguan</h4>
                    <p class="text-sm mb-0">Data laporan tangkapan berdasarkan hari dalam seminggu</p>
                </div>
                <div class="card-body">
                    <!-- Weekly Stats -->
                    <div class="row">
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card bg-gradient-primary">
                                <div class="card-body p-3">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="numbers">
                                                <p class="text-sm mb-0 text-white font-weight-bold">Total Laporan
                                                </p>
                                                <h5 class="font-weight-bolder text-white">245</h5>
                                                <p class="mb-0 text-white">
                                                    <span class="text-success text-sm font-weight-bolder">+12%</span>
                                                    dari minggu lalu
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-4 text-end">
                                            <div class="icon icon-shape bg-white shadow text-center border-radius-md">
                                                <i class="ni ni-single-copy-04 text-primary text-lg opacity-10"
                                                    aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card bg-gradient-success">
                                <div class="card-body p-3">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="numbers">
                                                <p class="text-sm mb-0 text-white font-weight-bold">Tangkapan (kg)</p>
                                                <h5 class="font-weight-bolder text-white">1,247</h5>
                                                <p class="mb-0 text-white">
                                                    <span class="text-success text-sm font-weight-bolder">+8%</span>
                                                    dari minggu lalu
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-4 text-end">
                                            <div class="icon icon-shape bg-white shadow text-center border-radius-md">
                                                <i class="ni ni-chart-bar-32 text-success text-lg opacity-10"
                                                    aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card bg-gradient-info">
                                <div class="card-body p-3">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="numbers">
                                                <p class="text-sm mb-0 text-white font-weight-bold">Rata-rata Harian</p>
                                                <h5 class="font-weight-bolder text-white">178 kg</h5>
                                                <p class="mb-0 text-white">
                                                    <span class="text-success text-sm font-weight-bolder">+5%</span>
                                                    dari minggu lalu
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-4 text-end">
                                            <div class="icon icon-shape bg-white shadow text-center border-radius-md">
                                                <i class="ni ni-calendar-grid-58 text-info text-lg opacity-10"
                                                    aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Weekly Chart -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header pb-0">
                                    <h6>Grafik Mingguan</h6>
                                    <p class="text-sm">Laporan harian dalam seminggu</p>
                                </div>
                                <div class="card-body">
                                    <canvas id="weekly-chart" class="chart-canvas"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Weekly Chart
        var ctxWeekly = document.getElementById('weekly-chart').getContext('2d');
        var weeklyChart = new Chart(ctxWeekly, {
            type: 'bar',
            data: {
                labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
                datasets: [{
                    label: 'Tangkapan (kg)',
                    data: [120, 150, 180, 200, 170, 190, 210],
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endpush
