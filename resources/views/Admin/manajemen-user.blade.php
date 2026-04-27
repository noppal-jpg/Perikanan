<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen User - SIPETANG</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Menggunakan CSS yang Anda berikan sebelumnya */
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
            z-index: 100;
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

        .sidebar-logo-text h3 { font-size: 14px; margin: 0; }
        .sidebar-logo-text p { font-size: 9px; opacity: 0.7; margin: 0; }

        .sidebar-menu {
            flex: 1;
            list-style: none;
        }

        .sidebar-menu li { margin-bottom: 20px; }

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
        .sidebar-menu a.active { background: rgba(255, 255, 255, 0.1); }

        .sidebar-logout {
            margin-top: auto;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }

        .sidebar-logout a { color: white; text-decoration: none; font-size: 14px; }

        /* Main Content Area */
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

        .search-box {
            display: flex;
            align-items: center;
            padding: 0 15px;
            background: #f5f5f5;
            border-radius: 6px;
            border: 1px solid #e0e0e0;
            width: 300px;
        }

        .search-box input {
            border: none;
            background: none;
            width: 100%;
            font-size: 14px;
            padding: 10px 0;
            outline: none;
            margin-left: 10px;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            text-align: right;
        }

        .user-profile img {
            width: 35px;
            height: 35px;
            border-radius: 6px;
        }

        /* Content Components */
        .content-header { margin-bottom: 25px; }
        .content-header h2 { font-size: 24px; color: #0d2640; }
        .content-header p { color: #666; font-size: 14px; }

        /* Filter Row */
        .filter-row {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
            align-items: flex-end;
        }

        .total-card {
            background: #0d2640;
            color: white;
            padding: 20px;
            border-radius: 12px;
            min-width: 150px;
        }

        .total-card small { font-size: 10px; opacity: 0.7; text-transform: uppercase; }
        .total-card h2 { font-size: 32px; }

        .filter-form {
            background: white;
            padding: 20px;
            border-radius: 12px;
            display: flex;
            gap: 15px;
            flex: 1;
            box-shadow: 0 2px 10px rgba(0,0,0,0.03);
        }

        .form-group { flex: 1; }
        .form-group label { display: block; font-size: 11px; color: #888; font-weight: 700; margin-bottom: 5px; }
        .form-group select, .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #eee;
            border-radius: 6px;
            background: #fcfcfc;
            font-size: 13px;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
        }

        .btn-primary { background: #2563eb; color: white; }
        .btn-dark { background: #0d2640; color: white; }

        /* Table User */
        .table-container {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.03);
        }

        table { width: 100%; border-collapse: collapse; }
        th { text-align: left; padding: 12px; font-size: 12px; color: #888; border-bottom: 1px solid #eee; text-transform: uppercase; }
        td { padding: 15px 12px; font-size: 13px; border-bottom: 1px solid #eee; }

        .user-info { display: flex; align-items: center; gap: 12px; }
        .avatar {
            width: 35px;
            height: 35px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 12px;
        }

        .tpi-badge {
            background: #e0f2fe;
            color: #0369a1;
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 600;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .page-info { font-size: 12px; color: #888; }
        .page-nav { display: flex; gap: 5px; }
        .page-link {
            padding: 5px 10px;
            border: 1px solid #eee;
            border-radius: 4px;
            text-decoration: none;
            color: #334155;
            font-size: 12px;
        }
        .page-link.active { background: #0d2640; color: white; border-color: #0d2640; }

        @media (max-width: 768px) {
            .sidebar { width: 60px; padding: 20px 10px; }
            .sidebar-logo-text, .sidebar-menu span, .sidebar-logout span { display: none; }
            .main-content { margin-left: 60px; }
        }
    </style>
</head>

<body>
    <aside class="sidebar">
        <div class="sidebar-logo">
            <div class="sidebar-logo-box">
                <i class="fas fa-ship"></i>
            </div>
            <div class="sidebar-logo-text">
                <h3>SIPETANG</h3>
                <p>HASIL TANGKAP</p>
            </div>
        </div>

        <ul class="sidebar-menu">
            <li><a href="#"><i class="fas fa-th-large"></i> <span>Dashboard</span></a></li>
            <li><a href="#" class="active"><i class="fas fa-users"></i> <span>Manajemen User</span></a></li>
            <li><a href="#"><i class="fas fa-file-check"></i> <span>Validasi Laporan</span></a></li>
            <li><a href="#"><i class="fas fa-print"></i> <span>Cetak Laporan</span></a></li>
        </ul>

        <div class="sidebar-logout">
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" style="background: none; border: none; color: white; text-decoration: none; font-size: 14px; cursor: pointer;">
                    <i class="fas fa-sign-out-alt"></i> <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <div class="main-content">
        <div class="header">
            <div class="search-box">
                <i class="fas fa-search" style="color: #999;"></i>
                <input type="text" placeholder="Cari data...">
            </div>
            <div class="header-right">
                <i class="fas fa-bell" style="color: #64748b;"></i>
                <i class="fas fa-cog" style="color: #64748b;"></i>
                <div class="user-profile">
                    <div>
                        <p style="font-size: 14px; font-weight: bold;">Admin</p>
                        <small style="color: #888;">DINAS PERIKANAN</small>
                    </div>
                    <img src="https://via.placeholder.com/35" alt="Profile">
                </div>
            </div>
        </div>

        <div class="content-header">
            <h2>Manajemen User</h2>
            <p>Kelola seluruh data Juru Rekap</p>
        </div>

        <div class="filter-row">
            <div class="total-card">
                <small>Total Data User</small>
                <h2>25</h2>
            </div>
            <div class="filter-form">
                <div class="form-group">
                    <label>Cari Data Petugas</label>
                    <input type="text" placeholder="Ketik nama atau ID...">
                </div>
                <div class="form-group">
                    <label>Asal TPI</label>
                    <select>
                        <option>Semua TPI</option>
                        <option>TPI Blanakan</option>
                        <option>TPI Mayangan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select>
                        <option>Semua</option>
                        <option>Laki-laki</option>
                        <option>Perempuan</option>
                    </select>
                </div>
                <button class="btn btn-primary">Terapkan</button>
            </div>
            <button class="btn btn-dark"><i class="fas fa-user-plus"></i> Tambah User</button>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Nama Petugas</th>
                        <th>Asal TPI</th>
                        <th>Jenis Kelamin</th>
                        <th>No Telepon</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="user-info">
                                <div class="avatar" style="background: #e0f2fe; color: #0369a1;">AS</div>
                                <div>
                                    <strong>Ahmad Sulaiman</strong><br>
                                    <small style="color: #888;">ID: JR-001</small>
                                </div>
                            </div>
                        </td>
                        <td><span class="tpi-badge">TPI Blanakan</span></td>
                        <td>Laki-laki</td>
                        <td>+62 812-3456-7890</td>
                        <td>Jl. Raya Pantura No. 45, Blanakan, S...</td>
                    </tr>
                    <tr>
                        <td>
                            <div class="user-info">
                                <div class="avatar" style="background: #f0fdf4; color: #166534;">SP</div>
                                <div>
                                    <strong>Siti Pertiwi</strong><br>
                                    <small style="color: #888;">ID: JR-002</small>
                                </div>
                            </div>
                        </td>
                        <td><span class="tpi-badge" style="background: #f1f5f9; color: #475569;">TPI Mayangan</span></td>
                        <td>Perempuan</td>
                        <td>+62 856-9876-5432</td>
                        <td>Perum Nusa Indah Blok C2, Pamanu...</td>
                    </tr>
                </tbody>
            </table>

            <div class="pagination">
                <p class="page-info">Menampilkan 1-4 dari 1,284 data</p>
                <div class="page-nav">
                    <a href="#" class="page-link"><i class="fas fa-chevron-left"></i></a>
                    <a href="#" class="page-link active">1</a>
                    <a href="#" class="page-link">2</a>
                    <a href="#" class="page-link">3</a>
                    <span style="color: #ccc;">...</span>
                    <a href="#" class="page-link">321</a>
                    <a href="#" class="page-link"><i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>