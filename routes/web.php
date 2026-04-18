<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', function () {
    // Simulated login logic - in real app, validate credentials
    // For now always redirect to dashboard
    return redirect()->route('dashboard');
})->name('login.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/validasi-laporan', function () {
    return view('validasi-laporan');
})->name('validasi.laporan');

Route::get('/statistik', function () {
    return view('statistik');
})->name('statistik');

Route::get('/manajemen-user', function () {
    return view('Admin.manajemen-user');
})->name('manajemen.user');

Route::get('/laporan', function () {
    return view('laporan');
})->name('laporan');

Route::get('/cetak-laporan', function () {
    return view('cetak-laporan');
})->name('laporan.cetak');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/profile/create', function () {
    return view('profile.create');
})->name('profile.create');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');

// simple logout simulation, clears session if needed
Route::get('/logout', function () {
    // In a real app you'd call Auth::logout() and invalidate session
    return redirect('/');
})->name('logout');
