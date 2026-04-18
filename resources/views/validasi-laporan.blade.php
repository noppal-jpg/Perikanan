<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validasi Laporan - SIPETANG</title>
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
            overflow-y: auto;
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
            font-size: 16px;
            color: #1a4d7d;
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
            margin-bottom: 8px;
        }

        .page-title p {
            font-size: 14px;
            color: #666;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .stat-content {
            flex: 1;
        }

        .stat-label {
            font-size: 11px;
            text-transform: uppercase;
            color: #999;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .stat-value {
            font-size: 32px;
            font-weight: 700;
            color: #1a4d7d;
        }

        .stat-icon-box {
            width: 50px;
            height: 50px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .stat-icon-pending {
            background: #fff3cd;
            color: #ff9800;
        }

        .stat-icon-validated {
            background: #d4edda;
            color: #4caf50;
        }

        .stat-icon-anomaly {
            background: #f8d7da;
            color: #f44336;
        }

        /* Filters Section */
        .filters-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .filter-group {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .btn-filter {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 18px;
            background: white;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
            color: #1a4d7d;
            transition: all 0.3s;
        }

        .btn-filter:hover {
            background: #f5f5f5;
            border-color: #1a4d7d;
        }

        .btn-accept-all {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            background: #0d2640;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-accept-all:hover {
            background: #1a4d7d;
        }

        /* Table Section */
        .table-section {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }

        .table-title {
            font-size: 14px;
            font-weight: 600;
            color: #1a4d7d;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .uploadable-info {
            font-size: 11px;
            color: #1a7fbb;
            margin-left: auto;
        }

        .reports-table {
            width: 100%;
            border-collapse: collapse;
        }

        .reports-table thead {
            background: #f5f5f5;
        }

        .reports-table th {
            padding: 15px 12px;
            text-align: left;
            font-size: 11px;
            text-transform: uppercase;
            color: #999;
            font-weight: 600;
            border-bottom: 1px solid #e0e0e0;
        }

        .reports-table td {
            padding: 15px 12px;
            border-bottom: 1px solid #e0e0e0;
            font-size: 13px;
            color: #333;
        }

        .date-cell {
            font-weight: 600;
            color: #1a4d7d;
        }

        .tpi-name {
            font-weight: 600;
            color: #1a4d7d;
        }

        .tpi-location {
            font-size: 11px;
            color: #999;
        }

        .fish-badge {
            display: inline-block;
            padding: 4px 10px;
            background: #e3f2fd;
            color: #1976d2;
            border-radius: 4px;
            font-size: 11px;
            font-weight: 600;
        }

        .volume-cell {
            font-weight: 600;
            color: #1a4d7d;
        }

        .status-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .status-pending {
            background: #fff3cd;
            color: #ff9800;
        }

        .status-validated {
            background: #d4edda;
            color: #4caf50;
        }

        .status-rejected {
            background: #f8d7da;
            color: #f44336;
        }

        .action-cell {
            display: flex;
            gap: 10px;
        }

        .action-btn {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 11px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .action-validate {
            background: #d4edda;
            color: #4caf50;
        }

        .action-validate:hover {
            background: #c3e6cb;
        }

        .action-reject {
            background: #f8d7da;
            color: #f44336;
        }

        .action-reject:hover {
            background: #f5c6cb;
        }

        /* Pagination */
        .pagination-section {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            margin-top: 20px;
        }

        .pagination-btn {
            width: 32px;
            height: 32px;
            border: 1px solid #e0e0e0;
            background: white;
            border-radius: 4px;
            cursor: pointer;
            font-size: 13px;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .pagination-btn:hover {
            border-color: #1a4d7d;
            color: #1a4d7d;
        }

        .pagination-btn.active {
            background: #0d2640;
            color: white;
            border-color: #0d2640;
        }

        .pagination-info {
            font-size: 12px;
            color: #999;
            margin: 0 10px;
        }

        /* Trend Section */
        .trend-section {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .trend-title {
            font-size: 14px;
            font-weight: 600;
            color: #1a4d7d;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .trend-description {
            font-size: 13px;
            color: #666;
            margin-bottom: 25px;
            line-height: 1.6;
        }

        .trend-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 25px;
        }

        .trend-stat {
            background: #f5f5f5;
            padding: 25px;
            border-radius: 8px;
        }

        .trend-stat-label {
            font-size: 11px;
            text-transform: uppercase;
            color: #999;
            letter-spacing: 0.5px;
            margin-bottom: 12px;
            font-weight: 600;
        }

        .trend-stat-value {
            font-size: 28px;
            font-weight: 700;
            color: #1a4d7d;
        }

        /* Footer */
        .page-footer {
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

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .filters-section {
                flex-direction: column;
                gap: 15px;
            }

            .filter-group {
                flex-direction: column;
                width: 100%;
            }

            .reports-table {
                font-size: 12px;
            }

            .reports-table td,
            .reports-table th {
                padding: 10px 8px;
            }

            .trend-stats {
                grid-template-columns: 1fr;
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
            <li><a href="{{ route('dashboard') }}"><i class="fas fa-th-large"></i> Dashboard</a></li>
            <li><a href="{{ route('validasi.laporan') }}" class="active"><i class="fas fa-check-circle"></i> Validasi Laporan</a></li>
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
                    <input type="text" placeholder="Cari laporan...">
                </div>
            </div>
            <div class="header-right">
                <div class="header-icons">
                    <div class="header-icon">
                        <i class="fas fa-bell"></i>
                    </div>
                    <div class="header-icon">
                        <i class="fas fa-cog"></i>
                    </div>
                    <div class="header-icon">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page Title -->
        <div class="page-title">
            <h1>Validasi Laporan</h1>
            <p>Otorisiasi dan verifikasi data hasil tangkapan laut dari seluruh Tempat Pelelangan Ikan (TPI) wilayah Subang.</p>
        </div>

        <!-- Stats Grid -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-content">
                    <div class="stat-label"><i class="fas fa-hourglass-half"></i> Menunggu</div>
                    <div class="stat-value">24</div>
                </div>
                <div class="stat-icon-box stat-icon-pending">
                    ⏳
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-content">
                    <div class="stat-label"><i class="fas fa-check"></i> Tervalidasi Hari Ini</div>
                    <div class="stat-value">8</div>
                </div>
                <div class="stat-icon-box stat-icon-validated">
                    ✓
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-content">
                    <div class="stat-label"><i class="fas fa-weight"></i> Total Volume (Ton)</div>
                    <div class="stat-value">8.4</div>
                </div>
                <div class="stat-icon-box stat-icon-validated">
                    📊
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-content">
                    <div class="stat-label"><i class="fas fa-exclamation-triangle"></i> Anomali Data</div>
                    <div class="stat-value" style="color: #f44336;">3</div>
                </div>
                <div class="stat-icon-box stat-icon-anomaly">
                    ⚠️
                </div>
            </div>
        </div>

        <!-- Filters Section -->
        <div class="filters-section">
            <div class="filter-group">
                <button class="btn-filter">
                    <i class="fas fa-filter"></i> Filter
                </button>
            </div>
            <button class="btn-accept-all">
                <i class="fas fa-check-double"></i> Terima Semua
            </button>
        </div>

        <!-- Table Section -->
        <div class="table-section">
            <div class="table-title">
                Antrean Laporan
                <span class="uploadable-info">📤 Uploadable total: 52.45 MB</span>
            </div>

            <table class="reports-table">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Nama TPI</th>
                        <th>Jenis Ikan</th>
                        <th>Volume (KG)</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="date-cell">24 Okt 2025</td>
                        <td>
                            <div class="tpi-name">TPI Mayangan</div>
                            <div class="tpi-location">Subang Utara</div>
                        </td>
                        <td><span class="fish-badge">Tongkol</span></td>
                        <td class="volume-cell">1, 250</td>
                        <td><span class="status-badge status-pending">Tertunda</span></td>
                        <td class="action-cell">
                            <button class="action-btn action-validate">Validasi</button>
                            <button class="action-btn action-reject">Tolak</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="date-cell">24 Okt 2025</td>
                        <td>
                            <div class="tpi-name">TPI Blanakan</div>
                            <div class="tpi-location">Subang Barat</div>
                        </td>
                        <td><span class="fish-badge">Kambung</span></td>
                        <td class="volume-cell">840</td>
                        <td><span class="status-badge status-pending">Tertunda</span></td>
                        <td class="action-cell">
                            <button class="action-btn action-validate">Validasi</button>
                            <button class="action-btn action-reject">Tolak</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="date-cell">23 Okt 2025</td>
                        <td>
                            <div class="tpi-name">TPI Ciasem</div>
                            <div class="tpi-location">Subang Timur</div>
                        </td>
                        <td><span class="fish-badge">Layur</span></td>
                        <td class="volume-cell">2, 180</td>
                        <td><span class="status-badge status-validated">Terima</span></td>
                        <td class="action-cell">
                            <button class="action-btn action-validate">Lihat Detail</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="date-cell">23 Okt 2025</td>
                        <td>
                            <div class="tpi-name">TPI Patimban</div>
                            <div class="tpi-location">Subang Utara</div>
                        </td>
                        <td><span class="fish-badge">Tongkol</span></td>
                        <td class="volume-cell">4, 580</td>
                        <td><span class="status-badge status-pending">Tertunda</span></td>
                        <td class="action-cell">
                            <button class="action-btn action-validate">Validasi</button>
                            <button class="action-btn action-reject">Tolak</button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="pagination-section">
                <button class="pagination-btn"><i class="fas fa-chevron-left"></i></button>
                <span class="pagination-info">Menampilkan 4 dari 24 laporan yang perlu divalidasi</span>
                <button class="pagination-btn active">1</button>
                <button class="pagination-btn">2</button>
                <button class="pagination-btn"><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>

        <!-- Trend Section -->
        <div class="trend-section">
            <div class="trend-title">
                <i class="fas fa-chart-line"></i> Tren Hasil Tangkapan Wilayah
            </div>
            <div class="trend-description">
                Analisis menggambar meningkatan peningkatan volume tangkapan sebesar 12% di TPI Patimban sejalan dengan dibukakannya rute ekasor baru. Perlu validasi ulang untuk laporan volume di atas 5 ton.
            </div>

            <div class="trend-stats">
                <div class="trend-stat">
                    <div class="trend-stat-label">Rata-rata Harian</div>
                    <div class="trend-stat-value">1.2 Ton</div>
                </div>
                <div class="trend-stat">
                    <div class="trend-stat-label">Komoditas Utama</div>
                    <div class="trend-stat-value">Tenggiri</div>
                </div>
            </div>
        </div>

        <div class="page-footer">
            SISTEM INFORMASI PENCATATAN HASIL TANGKAP
        </div>
    </div>
</body>

</html>