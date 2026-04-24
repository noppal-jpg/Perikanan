@extends('layouts.argon')

@section('title', 'Admin Dashboard')
@section('page-title', 'Dashboard Admin')

@section('content')
    <div class="row mb-4">
        <div class="col-lg-4 col-sm-6 mb-3">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body p-4">
                    <p class="text-uppercase text-xs font-weight-bold mb-2 text-muted">Total Pengguna</p>
                    <h3 class="font-weight-bold mb-3">{{ number_format(App\Models\User::count()) }}</h3>
                    <p class="text-sm text-secondary mb-0">Total semua akun dalam sistem.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-3">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body p-4">
                    <p class="text-uppercase text-xs font-weight-bold mb-2 text-muted">Admin Aktif</p>
                    <h3 class="font-weight-bold mb-3">{{ number_format(App\Models\User::where('role', 'admin')->count()) }}</h3>
                    <p class="text-sm text-secondary mb-0">Jumlah akun dengan akses admin.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-3">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body p-4">
                    <p class="text-uppercase text-xs font-weight-bold mb-2 text-muted">Staf Terdaftar</p>
                    <h3 class="font-weight-bold mb-3">{{ number_format(App\Models\User::where('role', 'staff')->count()) }}</h3>
                    <p class="text-sm text-secondary mb-0">Jumlah pengguna dengan role staf.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div>
                        <h6 class="mb-1">Ringkasan Manajemen</h6>
                        <p class="text-sm text-secondary mb-0">Halaman admin untuk memantau pengguna dan akses.</p>
                    </div>
                    <a href="{{ route('admin.manajemen.user') }}" class="btn btn-sm btn-primary">Buka Manajemen User</a>
                </div>
                <div class="card-body px-0 pt-3 pb-4">
                    <div class="table-responsive px-3">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID User</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(App\Models\User::latest('idUser')->take(5)->get() as $user)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="badge badge-sm bg-gradient-info me-3">{{ strtoupper($user->role) }}</span>
                                                <span class="text-sm font-weight-bold">{{ $user->username }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-sm text-secondary">{{ ucfirst($user->role) }}</span>
                                        </td>
                                        <td>
                                            <span class="text-sm text-secondary">{{ $user->idUser }}</span>
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
