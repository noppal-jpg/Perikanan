<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SIPETANG</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 200px;
            background: linear-gradient(180deg, #0d2640 0%, #1a4d7d 100%);
            color: white;
            padding: 30px 20px;
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 40px;
            font-weight: 700;
        }

        .sidebar-logo-box {
            background: white;
            width: 40px;
            height: 40px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #0d2640;
        }

        .sidebar-logo-text h3 {
            font-size: 14px;
            margin: 0;
        }

        .sidebar-logo-text p {
            font-size: 9px;
            opacity: 0.7;
            margin: 0;
        }

        .sidebar-menu {
            flex: 1;
            list-style: none;
        }

        .sidebar-menu li {
            margin-bottom: 20px;
        }

        .sidebar-menu a {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 10px;
            border-radius: 6px;
            transition: all 0.3s;
            font-size: 14px;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: rgba(255, 255, 255, 0.1);
        }

        .sidebar-menu i {
            width: 20px;
            text-align: center;
        }

        .sidebar-logout {
            margin-top: auto;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }

        .sidebar-logout a {
            color: white;
        }

        /* Main Content */
        .main-content {
            margin-left: 200px;
            flex: 1;
            padding: 30px;
        }

        /* Header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .header-search {
            display: flex;
            gap: 10px;
            flex: 1;
        }

        .search-box {
            display: flex;
            align-items: center;
            padding: 0 15px;
            background: #f5f5f5;
            border-radius: 6px;
            border: 1px solid #e0e0e0;
            flex: 1;
            max-width: 300px;
        }

        .search-box input {
            border: none;
            background: none;
            width: 100%;
            font-size: 14px;
            padding: 10px 0;
        }

        .search-box input::placeholder {
            color: #999;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .date-selector {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 15px;
            background: #f5f5f5;
            border-radius: 6px;
            font-size: 13px;
            color: #333;
        }

        .btn-input {
            background: #0d2640;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            font-size: 13px;
            transition: background 0.3s;
        }

        .btn-input:hover {
            background: #1a4d7d;
        }

        .header-icons {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .header-icon {
            width: 36px;
            height: 36px;
            border-radius: 6px;
            background: #f5f5f5;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background 0.3s;
        }

        .header-icon:hover {
            background: #e0e0e0;
        }

        /* Page Title */
        .page-title {
            margin-bottom: 30px;
        }

        .page-title h1 {
            font-size: 28px;
            font-weight: 600;
            color: #1a4d7d;
            margin-bottom: 5px;
        }

        .page-title p {
            font-size: 14px;
            color: #666;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .stat-label {
            font-size: 11px;
            text-transform: uppercase;
            color: #999;
            letter-spacing: 0.5px;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .stat-value {
            font-size: 36px;
            font-weight: 700;
            color: #1a4d7d;
            margin-bottom: 8px;
        }

        .stat-unit {
            font-size: 12px;
            color: #999;
        }

        /* Production Card - Dark Style */
        .production-card {
            background: linear-gradient(135deg, #0d2640 0%, #1a4d7d 100%);
            color: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .production-label {
            font-size: 11px;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.7);
            letter-spacing: 0.5px;
            margin-bottom: 15px;
            font-weight: 600;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .rt-badge {
            background: rgba(76, 175, 80, 0.2);
            color: #4caf50;
            padding: 4px 10px;
            border-radius: 4px;
            font-size: 10px;
            font-weight: 700;
        }

        .production-value {
            font-size: 48px;
            font-weight: 700;
        }

        /* Data Sections */
        .data-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }

        .data-card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .data-card-title {
            font-size: 12px;
            text-transform: uppercase;
            color: #999;
            letter-spacing: 0.5px;
            font-weight: 600;
            margin-bottom: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .data-card-number {
            font-size: 32px;
            font-weight: 700;
            color: #1a4d7d;
            margin-bottom: 10px;
        }

        .data-card-meta {
            font-size: 12px;
            color: #999;
        }

        /* Statistics Data */
        .stats-data {
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .stats-label {
            font-size: 13px;
            color: #666;
        }

        .stats-value {
            font-size: 16px;
            font-weight: 700;
            color: #1a4d7d;
        }

        .progress-bar {
            background: #e0e0e0;
            height: 6px;
            border-radius: 3px;
            overflow: hidden;
            margin-top: 8px;
        }

        .progress-fill {
            background: linear-gradient(90deg, #4caf50, #45a049);
            height: 100%;
            border-radius: 3px;
        }

        /* Activities Table */
        .activities-section {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .activities-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .activities-title {
            font-size: 14px;
            font-weight: 600;
            color: #1a4d7d;
        }

        .see-all-link {
            color: #1a7fbb;
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
        }

        .activities-table {
            width: 100%;
            border-collapse: collapse;
        }

        .activities-table thead {
            background: #f5f5f5;
        }

        .activities-table th {
            padding: 12px;
            text-align: left;
            font-size: 12px;
            text-transform: uppercase;
            color: #999;
            font-weight: 600;
            border-bottom: 1px solid #e0e0e0;
        }

        .activities-table td {
            padding: 15px 12px;
            border-bottom: 1px solid #e0e0e0;
            font-size: 13px;
            color: #333;
        }

        .staff-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 12px;
            background: #f5f5f5;
            border-radius: 6px;
        }

        .staff-icon {
            width: 28px;
            height: 28px;
            background: linear-gradient(135deg, #0d2640, #1a4d7d);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 12px;
            font-weight: 700;
        }

        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 4px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .status-validated {
            background: #d4edda;
            color: #155724;
        }

        .status-pending {
            background: #fff3cd;
            color: #856404;
        }

        .status-rejected {
            background: #f8d7da;
            color: #721c24;
        }

        .time-badge {
            font-size: 12px;
            color: #999;
        }

        /* Footer */
        .dashboard-footer {
            text-align: center;
            font-size: 11px;
            color: #999;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e0e0e0;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                flex-direction: row;
                align-items: center;
                padding: 15px;
            }

            .main-content {
                margin-left: 0;
                padding: 20px;
            }

            .header {
                flex-direction: column;
                gap: 15px;
            }

            .header-search {
                flex-direction: column;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .data-section {
                grid-template-columns: 1fr;
            }

            .activities-table {
                font-size: 12px;
            }

            .activities-table td {
                padding: 10px 8px;
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-logo">
            <div class="sidebar-logo-box">
                <i class="fas fa-water"></i>
            </div>
            <div class="sidebar-logo-text">
                <h3>SIPETANG</h3>
                <p>HASIL TANGKAP</p>
            </div>
        </div>

        <ul class="sidebar-menu">
            <li><a href="{{ route('dashboard') }}" class="active"><i class="fas fa-th-large"></i> Dashboard</a></li>
            <li><a href="{{ route('manajemen.user') }}"><i class="fas fa-users"></i> Manajemen User</a></li>
            <li><a href="{{ route('validasi.laporan') }}"><i class="fas fa-check-circle"></i> Validasi Laporan</a></li>
            <li><a href="{{ route('laporan.cetak') }}"><i class="fas fa-print"></i> Cetak Laporan</a></li>
            <li><a href="{{ route('statistik') }}"><i class="fas fa-chart-bar"></i> Data Statistik</a></li>
            <li><a href="#"><i class="fas fa-bell"></i> Notifikasi</a></li>
        </ul>

        <div class="sidebar-logout">
            <a href="#"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header">
            <div class="header-search">
                <div class="search-box">
                    <i class="fas fa-search" style="color: #999;"></i>
                    <input type="text" placeholder="Cari data...">
                </div>
            </div>
            <div class="header-right">
                <div class="date-selector">
                    <i class="fas fa-calendar"></i>
                    <span>Mei 2026</span>
                </div>
                <button class="btn-input"><i class="fas fa-plus"></i> Input Laporan</button>
                <div class="header-icons">
                    <div class="header-icon">
                        <i class="fas fa-bell" style="color: #1a4d7d;"></i>
                    </div>
                    <div class="header-icon">
                        <i class="fas fa-cog" style="color: #1a4d7d;"></i>
                    </div>
                    <div class="header-icon">
                        <i class="fas fa-user" style="color: #1a4d7d;"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page Title -->
        <div class="page-title">
            <h1>Ringkasan Operasional</h1>
            <p>Selamat datang kembali di sistem informasi hasil tangkap</p>
        </div>

        <!-- Main Stats -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-label"><i class="fas fa-users"></i> Total Data User</div>
                <div class="stat-value">30</div>
                <div class="stat-unit">Pengguna terdaftar</div>
            </div>

            <div class="production-card">
                <div class="production-label">
                    Data Produksi (Bulan)
                    <span class="rt-badge">🟢 REAL-TIME MONITOR</span>
                </div>
                <div class="production-value">10 <span style="font-size: 24px;">(ton)</span></div>
            </div>
        </div>

        <!-- Data Section -->
        <div class="data-section">
            <div class="data-card">
                <div class="data-card-title">
                    <span><i class="fas fa-file-alt"></i> Laporan Masuk</span>
                </div>
                <div class="data-card-number">482</div>
                <div class="data-card-meta">Laporan periode ini</div>
            </div>

            <div class="data-card">
                <div class="data-card-title">
                    <span><i class="fas fa-clock"></i> Validasi Tertunda</span>
                </div>
                <div class="data-card-number">12</div>
                <div class="data-card-meta">Sedang ditinjau</div>
            </div>
        </div>

        <!-- Statistics -->
        <div class="data-card" style="margin-bottom: 30px;">
            <div class="data-card-title">
                <span><i class="fas fa-chart-line"></i> Data Statistik Terkini</span>
                <i class="fas fa-ellipsis-v"></i>
            </div>
            
            <div class="stats-data">
                <div class="stats-label">Validasi Berhasil</div>
                <div class="stats-value">88%</div>
            </div>
            <div class="progress-bar">
                <div class="progress-fill" style="width: 88%;"></div>
            </div>

            <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid #e0e0e0;">
                <div class="stats-data">
                    <div class="stats-label" style="color: #d32f2f;">Anomali Terdeteksi</div>
                    <div class="stats-value" style="color: #d32f2f;">04</div>
                </div>
            </div>
        </div>

        <!-- Activities -->
        <div class="activities-section">
            <div class="activities-header">
                <div class="activities-title">Aktivitas Terbaru</div>
                <a href="#" class="see-all-link">Lihat Semua →</a>
            </div>

            <table class="activities-table">
                <thead>
                    <tr>
                        <th>Juru Rekap</th>
                        <th>Asal TPI</th>
                        <th>Status</th>
                        <th>Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="staff-badge">
                                <div class="staff-icon">AS</div>
                                <span>Andi Saputra</span>
                            </div>
                        </td>
                        <td>Blanakan</td>
                        <td><span class="status-badge status-validated">Tervalidasi</span></td>
                        <td class="time-badge">10 Menit yang lalu</td>
                    </tr>
                    <tr>
                        <td>
                            <div class="staff-badge">
                                <div class="staff-icon" style="background: linear-gradient(135deg, #1a7fbb, #2d9cbf);">RM</div>
                                <span>Rina Mardiana</span>
                            </div>
                        </td>
                        <td>Pondok Bali</td>
                        <td><span class="status-badge status-pending">Pending</span></td>
                        <td class="time-badge">25 Menit yang lalu</td>
                    </tr>
                    <tr>
                        <td>
                            <div class="staff-badge">
                                <div class="staff-icon" style="background: linear-gradient(135deg, #0d8aa8, #1a9dbf);">BK</div>
                                <span>Budi Kusuma</span>
                            </div>
                        </td>
                        <td>Mayangan</td>
                        <td><span class="status-badge status-validated">Tervalidasi</span></td>
                        <td class="time-badge">1 Jam yang lalu</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="dashboard-footer">
            SISTEM INFORMASI PENCATATAN HASIL TANGKAP • EDITORIAL DASHBARD V2 4.0
        </div>
    </div>
</body>

</html>