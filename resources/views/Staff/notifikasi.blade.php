@extends('layouts.argon')

@section('title', 'Notifikasi')
@section('page-title', 'Notifikasi')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card p-4">
                <h4 class="mb-3">Notifikasi</h4>
                <p class="text-sm text-muted">Semua pemberitahuan sistem akan ditampilkan di halaman ini.</p>
                <div class="list-group mt-4">
                    <div class="list-group-item">
                        <strong>Validasi laporan baru</strong>
                        <p class="mb-0 text-sm text-muted">Ada 3 laporan baru yang menunggu validasi.</p>
                    </div>
                    <div class="list-group-item">
                        <strong>Permintaan cetak laporan selesai</strong>
                        <p class="mb-0 text-sm text-muted">Laporan bulan Mei 2026 sudah siap dicetak.</p>
                    </div>
                    <div class="list-group-item">
                        <strong>Pembaruan sistem</strong>
                        <p class="mb-0 text-sm text-muted">Pembaruan keamanan dijadwalkan pada hari Minggu pukul 02:00.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
