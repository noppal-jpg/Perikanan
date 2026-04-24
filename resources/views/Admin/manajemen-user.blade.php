@extends('layouts.argon')

@section('title', 'Manajemen User')
@section('page-title', 'Manajemen User')

@section('content')
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body p-4">
                    <p class="text-uppercase text-xs font-weight-bold mb-2 text-muted">Total Data User</p>
                    <h3 class="font-weight-bold mb-3">{{ number_format($users->count()) }}</h3>
                    <p class="text-sm text-secondary mb-0">Semua pengguna yang terdaftar di sistem.</p>
                </div>
            </div>
        </div>
        <div class="col-xl-9 mb-3">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-5 mb-3 mb-md-0">
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0"><i class="fas fa-search text-secondary"></i></span>
                                <input type="text" class="form-control border-start-0" placeholder="Cari nama atau ID...">
                            </div>
                        </div>
                        <div class="col-md-2 mb-3 mb-md-0">
                            <select class="form-select">
                                <option selected>Semua TPI</option>
                                <option>Blanakan</option>
                                <option>Mayangan</option>
                                <option>Rawameneng</option>
                            </select>
                        </div>
                        <div class="col-md-2 mb-3 mb-md-0">
                            <select class="form-select">
                                <option selected>Semua</option>
                                <option>Laki-laki</option>
                                <option>Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-3 text-md-end">
                            <button class="btn btn-primary">Terapkan</button>
                            <button class="btn btn-outline-primary ms-2">Tambah User</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="mb-1">Daftar Petugas</h6>
                            <p class="text-sm text-secondary mb-0">Kelola semua akun admin dan staf dalam satu tampilan.</p>
                        </div>
                        <span class="badge bg-gradient-primary">{{ number_format($users->count()) }} Total</span>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-3">
                    <div class="table-responsive p-3">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Petugas</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Asal TPI</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis Kelamin</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No Telepon</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alamat</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-sm bg-gradient-info text-white rounded-circle d-flex align-items-center justify-content-center me-3">
                                                    {{ strtoupper(substr($user->username, 0, 2)) }}
                                                </div>
                                                <div class="d-flex flex-column">
                                                    <h6 class="mb-0 text-sm">{{ $user->username }}</h6>
                                                    <p class="text-xs text-secondary mb-0">ID: {{ $user->idUser }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-sm text-secondary">-</span>
                                        </td>
                                        <td>
                                            <span class="text-sm text-secondary">-</span>
                                        </td>
                                        <td>
                                            <span class="text-sm text-secondary">-</span>
                                        </td>
                                        <td>
                                            <span class="text-sm text-secondary">-</span>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-outline-primary me-2
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="mb-1">Daftar Petugas</h6>
                            <p class="text-sm text-secondary mb-0">Kelola semua akun admin dan staf dalam satu tampilan.</p>
                        </div>
                        <span class="badge bg-gradient-primary">{{ number_format($users->count()) }} Total</span>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-3">
                    <div class="table-responsive p-3">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Petugas</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Asal TPI</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis Kelamin</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No Telepon</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alamat</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-sm bg-gradient-info text-white rounded-circle d-flex align-items-center justify-content-center me-3">
                                                    {{ strtoupper(substr($user->username, 0, 2)) }}
                                                </div>
                                                <div class="d-flex flex-column">
                                                    <h6 class="mb-0 text-sm">{{ $user->username }}</h6>
                                                    <p class="text-xs text-secondary mb-0">ID: {{ $user->idUser }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-sm text-secondary">-</span>
                                        </td>
                                        <td>
                                            <span class="text-sm text-secondary">-</span>
                                        </td>
                                        <td>
                                            <span class="text-sm text-secondary">-</span>
                                        </td>
                                        <td>
                                            <span class="text-sm text-secondary">-</span>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-outline-primary me-2">Edit</a>
                                            <a href="#" class="btn btn-sm btn-outline-danger">Hapus</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
