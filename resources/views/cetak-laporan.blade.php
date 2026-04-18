@extends('layouts.argon')

@section('title', 'Cetak Laporan')
@section('page-title', 'Cetak Laporan')
@section('breadcrumb', 'Cetak Laporan')

@section('content')
    <style>
        .report-panel {
            min-height: 100%;
            border-radius: 1rem;
            border: 1px solid rgba(148, 163, 184, 0.12);
            background-color: #ffffff;
        }

        .report-panel .report-card-option {
            border: 1px solid transparent;
            border-radius: 1rem;
            transition: all 0.2s ease;
        }

        .report-panel .report-card-option:hover,
        .report-panel .report-card-option.active {
            border-color: #2d8cf0;
            background-color: rgba(96, 165, 250, 0.12);
        }

        .report-panel .report-card-option input {
            display: none;
        }

        .report-panel .report-card-option .icon-box {
            width: 40px;
            height: 40px;
            border-radius: 0.85rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-color: #eff6ff;
            color: #2563eb;
        }

        .report-panel .report-summary-card {
            background-color: #ffffff;
            border-radius: 1rem;
            box-shadow: 0 4px 18px rgba(15, 23, 42, 0.08);
        }

        .report-panel .status-chip {
            font-size: 0.72rem;
            padding: 0.35rem 0.75rem;
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
        }

        .report-panel .table-responsive {
            background-color: #ffffff;
            border-radius: 1rem;
            border: 1px solid rgba(148, 163, 184, 0.12);
        }

        .report-panel .table thead th {
            border-bottom: 0;
        }

        .report-panel .report-list-item {
            border-bottom: 1px solid rgba(148, 163, 184, 0.12);
        }

        .report-panel .report-list-item:last-child {
            border-bottom: none;
        }

        .report-panel .format-toggle .btn {
            min-width: 90px;
        }
    </style>

    <div class="row mb-4">
        <div class="col-12">
            <div class="card report-panel p-4">
                <div class="row align-items-center gy-3">
                    <div class="col-md-8">
                        <h4 class="fw-bold mb-2">Cetak Laporan</h4>
                        <p class="text-sm text-muted mb-0">Hasilkan dan ekspor laporan data maritim yang komprehensif. Pilih parameter Anda di bawah ini untuk membuat dokumentasi editorial resmi.</p>
                    </div>
                    <div class="col-md-4 text-md-end">
                        <div class="report-summary-card p-3 h-100 d-flex flex-column justify-content-center">
                            <small class="text-uppercase text-xs text-muted">Total Laporan</small>
                            <h3 class="mb-0">1,284</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-xl-7">
            <div class="card report-panel h-100 p-4">
                <div class="mb-4">
                    <h6 class="fw-bold mb-1">Konfigurasi Laporan</h6>
                    <p class="text-sm text-muted mb-0">Atur asal TPI, periode, dan jenis laporan sebelum mencetak.</p>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-5">
                        <label class="form-label text-sm text-uppercase text-muted">Asal TPI</label>
                        <select class="form-select">
                            <option selected>Blanakan</option>
                            <option>Pondok Bali</option>
                            <option>Patimban</option>
                            <option>Mayangan</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label text-sm text-uppercase text-muted">Mulai Dari</label>
                        <input type="date" class="form-control" />
                    </div>
                    <div class="col-md-4">
                        <label class="form-label text-sm text-uppercase text-muted">Sampai Dengan</label>
                        <input type="date" class="form-control" />
                    </div>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-12">
                        <div class="p-4 rounded-3" style="background-color: #f8fafc; border: 1px solid rgba(148, 163, 184, 0.18);">
                            <div class="row gy-3">
                                <div class="col-md-4">
                                    <label class="d-block report-card-option p-3 h-100">
                                        <input type="radio" name="report_period" checked />
                                        <div class="d-flex gap-3 align-items-start">
                                            <div class="icon-box"><i class="fas fa-calendar-day"></i></div>
                                            <div>
                                                <div class="fw-bold">Laporan Harian</div>
                                                <div class="text-sm text-muted">Rekapitulasi tiap hari hasil tangkap.</div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label class="d-block report-card-option active p-3 h-100">
                                        <input type="radio" name="report_period" />
                                        <div class="d-flex gap-3 align-items-start">
                                            <div class="icon-box"><i class="fas fa-calendar-alt"></i></div>
                                            <div>
                                                <div class="fw-bold">Laporan Bulanan</div>
                                                <div class="text-sm text-muted">Statistik tren produksi.</div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label class="d-block report-card-option p-3 h-100">
                                        <input type="radio" name="report_period" />
                                        <div class="d-flex gap-3 align-items-start">
                                            <div class="icon-box"><i class="fas fa-calendar-check"></i></div>
                                            <div>
                                                <div class="fw-bold">Laporan Tahunan</div>
                                                <div class="text-sm text-muted">Statistik tren produksi tahunan.</div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center gy-3">
                    <div class="col-md-8">
                        <div class="d-flex align-items-center gap-2 report-format-toggle">
                            <span class="text-sm text-uppercase text-muted">Format Output:</span>
                            <div class="btn-group format-toggle" role="group" aria-label="Format output">
                                <button type="button" class="btn btn-outline-secondary">PDF</button>
                                <button type="button" class="btn btn-outline-secondary">EXCEL</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-md-end">
                        <button type="button" class="btn btn-primary">Lihat Pratinjau</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-5">
            <div class="card report-panel h-100 p-4">
                <div class="mb-3 d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="fw-bold mb-1">Laporan Terkini</h6>
                        <p class="text-sm text-muted mb-0">Ringkasan file keluaran terbaru.</p>
                    </div>
                </div>

                <div class="report-list-item py-3">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <span class="badge bg-danger bg-opacity-10 text-danger"><i class="fas fa-file-pdf"></i></span>
                                <strong>Rekap_Blanakan_Jan.pdf</strong>
                            </div>
                            <small class="text-muted">12 menit yang lalu · 4.2 MB</small>
                        </div>
                        <a href="#" class="text-primary text-sm">Lihat</a>
                    </div>
                </div>
                <div class="report-list-item py-3">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <span class="badge bg-success bg-opacity-10 text-success"><i class="fas fa-file-excel"></i></span>
                                <strong>Rekap_Pondok_Bali.xlsx</strong>
                            </div>
                            <small class="text-muted">2 jam yang lalu · 12.8 MB</small>
                        </div>
                        <a href="#" class="text-primary text-sm">Lihat</a>
                    </div>
                </div>
                <div class="report-list-item py-3">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <span class="badge bg-danger bg-opacity-10 text-danger"><i class="fas fa-file-pdf"></i></span>
                                <strong>Rekap_Mayangan_April.pdf</strong>
                            </div>
                            <small class="text-muted">Kemarin · 11 MB</small>
                        </div>
                        <a href="#" class="text-primary text-sm">Lihat</a>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <a href="#" class="text-primary text-sm fw-bold">Lihat Semua Riwayat</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card report-panel p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h6 class="fw-bold mb-0">Tabel Arsip Laporan Cetak</h6>
                    </div>
                </div>

                <div class="table-responsive p-2">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder">ID Laporan</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Tanggal Dibuat</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Cakupan Data</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Dibuat Oleh</th>
                                <th class="text-end text-uppercase text-secondary text-xxs font-weight-bolder">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="fw-bold">#MAR-2601-092</td>
                                <td class="text-muted">24 Jan 2026, 09:12</td>
                                <td><span class="badge bg-info bg-opacity-10 text-info">01 Jan - 23 Jan</span></td>
                                <td class="text-muted">TPI Pondok Bali</td>
                                <td class="text-end"><a href="#" class="text-primary text-sm">Lihat Detail</a></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">#MAR-2601-088</td>
                                <td class="text-muted">22 Jan 2026, 15:45</td>
                                <td><span class="badge bg-secondary bg-opacity-10 text-secondary">TPI Patimban Only</span></td>
                                <td class="text-muted">TPI Blanakan</td>
                                <td class="text-end"><a href="#" class="text-primary text-sm">Lihat Detail</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-3">
                    <span class="text-sm text-muted">Menampilkan 2 dari 1,284 entri</span>
                    <nav>
                        <ul class="pagination pagination-sm mb-0">
                            <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
