<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Statistik - SIPETANG</title>
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
            color: #1f2937;
        }

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
            padding: 0;
            margin: 0;
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
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
        }

        .main-content {
            margin-left: 200px;
            flex: 1;
            padding: 30px;
        }

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
            max-width: 380px;
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

        .stats-panel {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }

        .chart-card,
        .insight-card,
        .detail-card,
        .region-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            padding: 25px;
        }

        .chart-card {
            min-height: 360px;
        }

        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 24px;
        }

        .chart-header h2 {
            margin: 0;
            font-size: 18px;
            font-weight: 700;
            color: #0f172a;
        }

        .chart-header span {
            font-size: 12px;
            color: #475569;
            text-transform: uppercase;
            letter-spacing: 0.12em;
        }

        .chart-meta {
            display: flex;
            gap: 12px;
            align-items: center;
            margin-top: 10px;
            flex-wrap: wrap;
        }

        .meta-pill {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 999px;
            padding: 8px 14px;
            font-size: 12px;
            color: #475569;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .meta-pill i {
            color: #1d4ed8;
        }

        .chart-area {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 220px;
            background: linear-gradient(180deg, #f8fbff 0%, #ffffff 100%);
            border-radius: 16px;
            position: relative;
            overflow: hidden;
        }

        .chart-area::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at top, rgba(59, 130, 246, 0.12), transparent 35%);
        }

        .chart-svg {
            width: 100%;
            height: 100%;
            position: relative;
            z-index: 1;
        }

        .chart-line {
            stroke: #0d2640;
            stroke-width: 4;
            fill: none;
        }

        .chart-grid {
            stroke: #e2e8f0;
            stroke-width: 1;
        }

        .chart-axis text,
        .chart-axis tspan {
            fill: #94a3b8;
            font-size: 11px;
        }

        .key-cards {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }

        .key-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            padding: 22px;
        }

        .key-card .label {
            font-size: 11px;
            text-transform: uppercase;
            color: #94a3b8;
            letter-spacing: 0.12em;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .key-card .value {
            font-size: 34px;
            font-weight: 700;
            color: #0d2640;
            margin-bottom: 6px;
        }

        .key-card .note {
            font-size: 13px;
            color: #64748b;
        }

        .insight-card h3 {
            font-size: 14px;
            margin-bottom: 18px;
            color: #0f172a;
        }

        .insight-item {
            display: flex;
            justify-content: space-between;
            gap: 18px;
            align-items: center;
            margin-bottom: 18px;
        }

        .insight-item:last-child {
            margin-bottom: 0;
        }

        .insight-meta {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .insight-meta strong {
            font-size: 16px;
            color: #0d2640;
        }

        .insight-meta small {
            color: #64748b;
            font-size: 12px;
        }

        .progress-bar {
            width: 100%;
            height: 8px;
            border-radius: 999px;
            background: #e2e8f0;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            border-radius: 999px;
            background: linear-gradient(90deg, #0d2640, #1a4d7d);
        }

        .region-card {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .region-info h2 {
            margin: 0 0 12px;
            font-size: 18px;
            color: #0f172a;
        }

        .region-info p {
            color: #64748b;
            line-height: 1.7;
            margin-bottom: 20px;
        }

        .region-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: grid;
            gap: 14px;
        }

        .region-list li {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 14px 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
        }

        .region-status {
            font-size: 11px;
            font-weight: 700;
            color: #0d2640;
            background: #eff6ff;
            padding: 5px 10px;
            border-radius: 999px;
        }

        .map-card {
            background: linear-gradient(180deg, #eaf4ff 0%, #ffffff 100%);
            border-radius: 18px;
            min-height: 280px;
            position: relative;
            overflow: hidden;
            box-shadow: inset 0 0 0 1px rgba(15, 23, 42, 0.03);
        }

        .map-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: radial-gradient(circle at 20% 25%, rgba(13, 37, 64, 0.12), transparent 14%),
                              radial-gradient(circle at 72% 35%, rgba(59, 130, 246, 0.11), transparent 12%),
                              radial-gradient(circle at 50% 70%, rgba(90, 121, 213, 0.14), transparent 18%);
        }

        .map-placeholder {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #475569;
            font-size: 14px;
            font-weight: 600;
            z-index: 1;
        }

        .map-dot {
            position: absolute;
            width: 14px;
            height: 14px;
            border-radius: 50%;
            background: #0d2640;
            box-shadow: 0 0 0 6px rgba(13, 37, 64, 0.12);
        }

        .map-dot.dot-1 { top: 32%; left: 28%; }
        .map-dot.dot-2 { top: 54%; left: 64%; }
        .map-dot.dot-3 { top: 68%; left: 44%; }

        .dashboard-footer {
            text-align: center;
            font-size: 11px;
            color: #999;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e0e0e0;
        }

        @media (max-width: 1024px) {
            .stats-panel {
                grid-template-columns: 1fr;
            }

            .region-card {
                grid-template-columns: 1fr;
            }

            .main-content {
                margin-left: 0;
            }

            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                flex-direction: row;
                padding: 20px;
            }

            .sidebar-menu {
                display: flex;
                flex-wrap: wrap;
                gap: 10px;
            }

            .sidebar-menu li {
                margin-bottom: 0;
            }

            .sidebar-logout {
                margin-top: 20px;
                border-top: none;
            }
        }

        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                gap: 15px;
            }

            .header-right {
                width: 100%;
                justify-content: space-between;
                flex-wrap: wrap;
            }

            .search-box {
                max-width: 100%;
            }

            .chart-card,
            .insight-card,
            .detail-card,
            .region-card {
                padding: 20px;
            }

            .meta-pill,
            .date-selector,
            .btn-input {
                width: 100%;
            }

            .header-icons {
                justify-content: flex-end;
                width: 100%;
            }
        }
    </style>
</head>

<body>
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
            <li><a href="dashboard"><i class="fas fa-th-large"></i> Dashboard</a></li>
            <li><a href="validasi-laporan" class="active"><i class="fas fa-check-circle"></i> Validasi Laporan</a></li>
            <li><a href="cetak-laporan"><i class="fas fa-print"></i> Cetak Laporan</a></li>
            <li><a href="statistik"><i class="fas fa-chart-bar"></i> Data Statistik</a></li>
            <li><a href="notifikasi"><i class="fas fa-bell"></i> Notifikasi</a></li>
        </ul>

        <div class="sidebar-logout">
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" style="background: none; border: none; color: white; text-decoration: none; font-size: 14px; cursor: pointer;">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>
    </aside>

    <div class="main-content">
        <div class="header">
            <div class="header-search">
                <div class="search-box">
                    <i class="fas fa-search" style="color: #999;"></i>
                    <input type="text" placeholder="Cari statistik...">
                </div>
            </div>
            <div class="header-right">
                <div class="date-selector">
                    <i class="fas fa-calendar"></i>
                    <span>Mei 2026</span>
                </div>
                <button class="btn-input"><i class="fas fa-plus"></i> Input Laporan</button>
                <div class="header-icons">
                    <div class="header-icon"><i class="fas fa-bell" style="color: #1a4d7d;"></i></div>
                    <div class="header-icon"><i class="fas fa-cog" style="color: #1a4d7d;"></i></div>
                    <div class="header-icon"><i class="fas fa-user" style="color: #1a4d7d;"></i></div>
                </div>
            </div>
        </div>

        <div class="page-title">
            <h1>Data Statistik</h1>
            <p>Analisis komprehensif sektor kelautan dan perikanan Kabupaten Subang. Visualisasi data real-time untuk mendukung pengambilan keputusan administratif.</p>
        </div>

        <div class="stats-panel">
            <div class="chart-card">
                <div class="chart-header">
                    <div>
                        <h2>Produksi Ikan Bulanan</h2>
                        <div class="chart-meta">
                            <span class="meta-pill"><i class="fas fa-chart-line"></i> Data kumulatif tangkapan laut (Ton) - 2025</span>
                        </div>
                    </div>
                    <span class="meta-pill"><i class="fas fa-water"></i> Tangkapan Laut</span>
                </div>
                <div class="chart-area">
                    <svg class="chart-svg" viewBox="0 0 800 240" preserveAspectRatio="none">
                        <defs>
                            <linearGradient id="chartFill" x1="0" y1="0" x2="0" y2="1">
                                <stop offset="0%" stop-color="#0d2640" stop-opacity="0.22" />
                                <stop offset="100%" stop-color="#0d2640" stop-opacity="0" />
                            </linearGradient>
                        </defs>
                        <path class="chart-grid" d="M50 40 H750 M50 80 H750 M50 120 H750 M50 160 H750 M50 200 H750" />
                        <path class="chart-grid" d="M150 20 V220 M300 20 V220 M450 20 V220 M600 20 V220" />
                        <path class="chart-line" d="M50 180 C150 170 170 120 250 130 C330 140 360 90 450 105 C540 120 620 80 750 100" />
                        <path d="M50 180 C150 170 170 120 250 130 C330 140 360 90 450 105 C540 120 620 80 750 100 L750 220 L50 220 Z" fill="url(#chartFill)" opacity="0.8" />
                        <g class="chart-axis">
                            <text x="50" y="235">Jan</text>
                            <text x="175" y="235">Feb</text>
                            <text x="300" y="235">Mar</text>
                            <text x="425" y="235">Apr</text>
                            <text x="550" y="235">Mei</text>
                            <text x="675" y="235">Jun</text>
                            <text x="750" y="235">Jul</text>
                        </g>
                    </svg>
                </div>
            </div>

            <div class="insight-card">
                <h3>Komoditas Teratas</h3>
                <div class="insight-item">
                    <div class="insight-meta">
                        <strong>Ikan Kembung</strong>
                        <small>42%</small>
                    </div>
                    <div class="progress-bar"><div class="progress-fill" style="width: 42%;"></div></div>
                </div>
                <div class="insight-item">
                    <div class="insight-meta">
                        <strong>Cumi-cumi</strong>
                        <small>28%</small>
                    </div>
                    <div class="progress-bar"><div class="progress-fill" style="width: 28%;"></div></div>
                </div>
                <div class="insight-item">
                    <div class="insight-meta">
                        <strong>Tongkol</strong>
                        <small>18%</small>
                    </div>
                    <div class="progress-bar"><div class="progress-fill" style="width: 18%;"></div></div>
                </div>
                <small style="display:block; margin-top:18px; color:#64748b; font-size:12px;">Terakhir diperbarui: 15 Okt 2025</small>
            </div>
        </div>

        <div class="key-cards">
            <div class="key-card">
                <div class="label"><i class="fas fa-exclamation-triangle"></i> TPI Teraktif</div>
                <div class="value">Blanakan</div>
                <div class="note">15 Laporan/tahun</div>
            </div>
            <div class="key-card">
                <div class="label"><i class="fas fa-boxes"></i> Total Produksi</div>
                <div class="value">8.4K <span style="font-size: 18px; color:#64748b;">Ton</span></div>
                <div class="note">Pertumbuhan +12%</div>
            </div>
        </div>

        <div class="region-card">
            <div class="region-info">
                <h2>Sebaran Wilayah TPI Kabupaten Subang</h2>
                <p>Lokasi wilayah persebaran 8 TPI di sekitar Kabupaten Subang. Pantau aktivitas perikanan secara geografis untuk mengambil keputusan alokasi sumber daya dan logistik.</p>
                <ul class="region-list">
                    <li>
                        <span>Wilayah Blanakan</span>
                        <span class="region-status">High Activity</span>
                    </li>
                    <li>
                        <span>Wilayah Legonkulon</span>
                        <span class="region-status">Moderate</span>
                    </li>
                    <li>
                        <span>Wilayah Patimban</span>
                        <span class="region-status">Developing</span>
                    </li>
                </ul>
            </div>
            <div class="map-card">
                <div class="map-placeholder">Peta Sebaran TPI</div>
                <div class="map-dot dot-1"></div>
                <div class="map-dot dot-2"></div>
                <div class="map-dot dot-3"></div>
            </div>
        </div>

        <div class="dashboard-footer">
            SISTEM INFORMASI PENCATATAN HASIL TANGKAP
        </div>
    </div>
</body>

</html>
