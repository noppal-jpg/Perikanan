@extends('layouts.argon')

@section('title', 'Manajemen User')
@section('page-title', 'Manajemen User / Data Karyawan TPI')

@push('head')
    <style>
        .management-header {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 1rem;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .management-header .filter-group {
            display: flex;
            gap: 0.75rem;
            flex-wrap: wrap;
        }

        .management-header .filter-group .input-group {
            min-width: 220px;
        }

        .management-header .filter-group .form-select,
        .management-header .filter-group .form-control,
        .management-header .filter-group .input-group-text {
            border-radius: 0.85rem;
            border: 1px solid rgba(148, 163, 184, 0.22);
            background: #111827;
            color: #f8fafc;
        }

        .management-header .filter-group .input-group-text {
            border-right: 0;
            background: #0f172a;
        }

        .management-header .filter-group .form-select option {
            background: #0f172a;
            color: #f8fafc;
        }

        .management-card {
            border: 1px solid rgba(148, 163, 184, 0.18);
            border-radius: 1.5rem;
            overflow: hidden;
            background: linear-gradient(135deg, #111827 0%, #0f172a 100%);
            box-shadow: 0 28px 80px rgba(15, 23, 42, 0.25);
        }

        .management-card .card-body {
            padding: 2rem;
        }

        .management-table {
            border-collapse: separate;
            border-spacing: 0 14px;
        }

        .management-table thead th {
            border-bottom: none;
            color: #cbd5e1;
            font-size: 0.82rem;
            text-transform: uppercase;
            letter-spacing: 0.14em;
            padding: 1rem 0.75rem 0.75rem;
            vertical-align: bottom;
        }

        .management-table thead th:first-child {
            padding-left: 1.2rem;
        }

        .management-table thead th:last-child {
            padding-right: 1.2rem;
        }

        .management-table tbody tr {
            background: rgba(30, 41, 59, 0.96);
            border: 1px solid rgba(148, 163, 184, 0.12);
            border-radius: 1rem;
        }

        .management-table tbody td {
            vertical-align: middle;
            border-top: none;
            padding: 1.1rem 0.9rem;
            color: #e2e8f0;
        }

        .management-table tbody tr td:first-child {
            padding-left: 1.3rem;
        }

        .management-table tbody tr td:last-child {
            padding-right: 1.3rem;
        }

        .management-table .btn-action {
            min-width: 100px;
            padding: 0.45rem 0.8rem;
            border-radius: 0.85rem;
            font-size: 0.78rem;
            color: #0f172a;
            background: #a5b4fc;
            border: 0;
            box-shadow: 0 10px 24px rgba(59, 130, 246, 0.14);
        }

        .management-table .btn-action:hover {
            background: #818cf8;
        }

        .management-table .btn-action+.btn-action {
            margin-left: 0.5rem;
        }

        .management-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 90px;
            background: rgba(59, 130, 246, 0.16);
            color: #bfdbfe;
            border-radius: 0.9rem;
            padding: 0.35rem 0.8rem;
            font-size: 0.78rem;
        }

        .management-toolbar {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
            margin-top: 1.75rem;
        }

        .management-toolbar .pagination {
            margin: 0;
        }

        .management-toolbar .page-info {
            color: #94a3b8;
            font-size: 0.92rem;
        }

        .btn-add-user {
            border-radius: 1.1rem;
            padding: 0.95rem 1.35rem;
            background: #0284c7;
            border: none;
            color: #ffffff;
            box-shadow: 0 16px 32px rgba(2, 132, 199, 0.2);
        }

        .btn-add-user:hover {
            background: #0369a1;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .empty-state-box {
            border-radius: 1.1rem;
            background: rgba(15, 23, 42, 0.95);
            border: 1px dashed rgba(148, 163, 184, 0.25);
            padding: 3rem 1rem;
            margin: 1rem;
            box-shadow: inset 0 0 0 1px rgba(96, 165, 250, 0.08);
        }

        .empty-state-box p {
            color: #94a3b8;
            margin-bottom: 0.5rem;
        }

        .empty-state-box strong {
            color: #f8fafc;
        }
    </style>
@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card management-card">
                <div class="card-body">
                    <div class="management-header">
                        <div>
                            <h5 class="mb-1 text-white">Manajemen User / Data Karyawan TPI</h5>
                            <p class="text-sm text-muted mb-0">Kelola data karyawan TPI dengan tabel, filter, dan aksi cepat.
                            </p>
                        </div>
                        <a href="{{ url('/profile/create') }}" class="btn btn-add-user">+ Tambah Karyawan Baru</a>
                    </div>

                    <div class="management-header">
                        <div class="filter-group">
                            <div class="input-group">
                                <span class="input-group-text bg-slate-800 text-white border-0 rounded-start">Show</span>
                                <select class="form-select">
                                    <option selected>10</option>
                                    <option>20</option>
                                    <option>50</option>
                                </select>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text bg-slate-800 text-white border-0 rounded-start">Filter Asal
                                    TPI</span>
                                <select class="form-select">
                                    <option selected>Semua TPI</option>
                                    <option>TPI A</option>
                                    <option>TPI B</option>
                                    <option>TPI C</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table management-table mb-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Umur</th>
                                    <th>Asal TPI</th>
                                    <th class="text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="7" class="text-center py-5">
                                        <div class="empty-state-box">
                                            <p class="mb-2">Belum ada data user yang dimasukkan.</p>
                                            <p class="mb-0">Klik tombol <strong>Tambah Karyawan Baru</strong> untuk mulai
                                                menambahkan data karyawan TPI.</p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="management-toolbar">
                        <div class="management-toolbar">
                            <span class="page-info">Showing 0 of 0 entries</span>
                        </div>
                        <nav>
                            <ul class="pagination mb-0">
                                <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item disabled"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
