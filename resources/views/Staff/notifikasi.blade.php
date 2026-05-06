@extends('layouts.argon')

@section('title', 'Pemberitahuan')
@section('page-title', 'Pemberitahuan')

@push('head')
    <style>
        .notif-header {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 1rem;
            align-items: center;
            padding: 1.75rem 1.75rem 1rem;
            background: transparent;
        }

        .notif-header h2 {
            font-size: 1.95rem;
            font-weight: 800;
            margin-bottom: 0.35rem;
        }

        .notif-header p {
            margin-bottom: 0;
            color: #64748b;
            font-size: 0.95rem;
        }

        .notif-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
        }

        .notif-actions .btn {
            min-width: 180px;
            border-radius: 1rem;
            padding: 0.8rem 1.2rem;
            font-weight: 700;
            font-size: 0.9rem;
        }

        .notif-actions .btn-primary {
            background: #f97316;
            border-color: #f97316;
            box-shadow: 0 12px 24px rgba(249, 115, 22, 0.18);
        }

        .notif-actions .btn-outline-primary {
            color: #0f172a;
            border-color: #e2e8f0;
            background: #ffffff;
        }

        .notif-actions .btn-outline-primary:hover {
            background: #f8fafc;
        }

        .notif-panel {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 1.5rem;
            margin-top: 1.5rem;
        }

        .notif-card,
        .notif-tile {
            border-radius: 1.5rem;
            border: none;
            box-shadow: 0 30px 60px rgba(15, 23, 42, 0.08);
        }

        .notif-card {
            padding: 1.5rem;
            background: #ffffff;
        }

        .notif-card small {
            display: inline-block;
            margin-top: 0.75rem;
            color: #94a3b8;
            font-weight: 700;
            background: #f8fafc;
            padding: 0.5rem 0.9rem;
            border-radius: 999px;
        }

        .notif-list {
            display: grid;
            gap: 1rem;
        }

        .notif-tile {
            padding: 1.5rem;
            background: #ffffff;
        }

        .notif-tile .tile-title {
            font-size: 1rem;
            font-weight: 800;
            margin-bottom: 0.75rem;
        }

        .notif-tile .tile-text {
            color: #475569;
            margin-bottom: 1rem;
            line-height: 1.7;
        }

        .notif-tile .tile-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 0.75rem;
            color: #94a3b8;
            font-size: 0.88rem;
        }

        .notif-tile .tile-meta .badge-dot {
            width: 0.75rem;
            height: 0.75rem;
            border-radius: 50%;
            background: #dc2626;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .notif-tile .tile-actions {
            margin-top: 1.15rem;
            display: flex;
            gap: 0.75rem;
            flex-wrap: wrap;
        }

        .notif-tile .btn-secondary {
            background: #e2e8f0;
            color: #0f172a;
            border: none;
            border-radius: 0.9rem;
            padding: 0.75rem 1.1rem;
            font-weight: 700;
        }

        .notif-tile .btn-danger {
            background: #dc2626;
            border: none;
            border-radius: 0.9rem;
            padding: 0.75rem 1.1rem;
            color: #ffffff;
            font-weight: 700;
        }

        @media (max-width: 991px) {
            .notif-panel {
                grid-template-columns: 1fr;
            }

            .notif-actions .btn {
                min-width: auto;
                width: 100%;
            }
        }
    </style>
@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card bg-transparent border-0 shadow-none">
                <div class="notif-header">
                    <div>
                        <span class="badge bg-primary bg-gradient text-uppercase fw-bold">Pemberitahuan</span>
                        <h2 class="mt-3">Pemberitahuan Sistem</h2>
                        <p>Semua aktivitas terbaru dan status validasi laporan akan ditampilkan di sini.</p>
                    </div>
                    <div class="notif-actions">
                        <button class="btn btn-outline-primary">Tandai semua telah dibaca</button>
                        <button class="btn btn-primary">Pengaturan</button>
                    </div>
                </div>
                <div class="notif-panel">
                    <div class="notif-card">
                        <div class="mb-4">
                            <span class="text-uppercase text-xs fw-bold text-secondary">Kategori</span>
                            <h5 class="mt-2 mb-3">Semua Pemberitahuan</h5>
                        </div>
                        <div class="d-flex flex-column gap-3">
                            <div class="d-flex justify-content-between align-items-center p-3 bg-surface rounded-3">
                                <div>
                                    <strong>Semua Pemberitahuan</strong>
                                    <p class="mb-0 text-sm text-muted">Ringkasan semua notifikasi.</p>
                                </div>
                                <span class="badge bg-dark">12</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center p-3 bg-white rounded-3 border">
                                <div>
                                    <strong>Validasi</strong>
                                    <p class="mb-0 text-sm text-muted">Laporan validasi baru.</p>
                                </div>
                                <span class="badge bg-info">8</span>
                            </div>
                        </div>
                    </div>
                    <div class="notif-list">
                        <div class="notif-tile">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div>
                                    <p class="text-uppercase text-xs text-warning fw-bold mb-2">Laporan Baru</p>
                                    <h5 class="tile-title">TPI Blanakan</h5>
                                </div>
                                <span class="badge-dot"></span>
                            </div>
                            <p class="tile-text">Juru Rekap <strong>Budi Santoso</strong> telah menginputkan data produksi pada 15 April 2026. Jenis Ikan Tongkol, Total berat 7 Kg.</p>
                            <div class="tile-meta">
                                <span>2 menit lalu</span>
                                <span class="text-warning fw-bold">Butuh Validasi</span>
                            </div>
                            <div class="tile-actions">
                                <button class="btn btn-danger">Validasi</button>
                                <button class="btn btn-secondary">Lihat Detail</button>
                            </div>
                        </div>
                        <div class="notif-tile">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div>
                                    <p class="text-uppercase text-xs text-slate fw-bold mb-2">Validasi Berhasil</p>
                                    <h5 class="tile-title">TPI Patimban</h5>
                                </div>
                                <span class="badge bg-success">Selesai</span>
                            </div>
                            <p class="tile-text">Laporan TPI Patimban pada 10 April telah divalidasi dan masuk database statistik oleh Admin Sutisna.</p>
                            <div class="tile-meta">
                                <span>1 jam lalu</span>
                                <span class="text-success fw-bold">Divalidasi oleh Admin: Sutisna</span>
                            </div>
                        </div>
                        <div class="text-center py-3">
                            <a href="#" class="text-secondary text-sm">Muat notifikasi lama</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
