<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});

// Auth Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout.post');

Route::middleware('auth')->group(function () {
    
    // Logic Redirect Dashboard berdasarkan Role
    Route::get('/dashboard', function () {
        if (strtolower(auth()->user()->role) === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('staff.dashboard');
    })->name('dashboard');

    // --- DAFTAR ROUTE STAFF ---
    Route::prefix('staff')->group(function () {
        
        Route::get('/dashboard', function () {
            abort_if(strtolower(auth()->user()->role) !== 'staff', 403);
            return view('Staff.dashboard');
        })->name('staff.dashboard');

        Route::get('/validasi-laporan', function () {
            return view('Staff.validasi-laporan');
        })->name('staff.validasi');

        Route::get('/statistik', function () {
            return view('Staff.statistik');
        })->name('staff.statistik');

        Route::get('/laporan', function () {
            return view('Staff.laporan');
        })->name('staff.laporan');

        Route::get('/cetak-laporan', function () {
            return view('Staff.cetak-laporan');
        })->name('staff.cetak');

        Route::get('/notifikasi', function () {
            return view('Staff.notifikasi');
        })->name('staff.notifikasi');

        Route::get('/profile', function () {
            return view('Staff.profile');
        })->name('staff.profile');

        Route::get('/profile/create', function () {
            return view('Staff.profile-create');
        })->name('staff.profile.create');
    });

    // --- DAFTAR ROUTE ADMIN ---
    Route::get('/admin/dashboard', function () {
        abort_if(strtolower(auth()->user()->role) !== 'admin', 403);
        return view('Admin.dashboard-admin');
    })->name('admin.dashboard');

    Route::get('/manajemen-user', function () {
        if (strtolower(auth()->user()->role) !== 'admin') {
            return redirect()->route('dashboard');
        }
        return redirect()->route('admin.manajemen.user');
    })->name('manajemen.user');

    Route::get('/admin/manajemen-user', function () {
        abort_if(strtolower(auth()->user()->role) !== 'admin', 403);
        return view('Admin.manajemen-user', [
            'users' => User::all(),
        ]);
    })->name('admin.manajemen.user');
});

// Guest Routes
Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');