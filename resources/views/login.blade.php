<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPETANG - Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }

        /* Login Container */
        .login-wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* Left Side - Dark Background */
        .login-left {
            background: linear-gradient(135deg, #0d2640 0%, #1a4d7d 100%);
            color: white;
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            width: 50%;
            position: relative;
            overflow: hidden;
        }

        .login-left::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 500px;
            height: 500px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
        }

        .login-left::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -20%;
            width: 400px;
            height: 400px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
        }

        .login-left-content {
            position: relative;
            z-index: 1;
        }

        .logo-section {
            margin-bottom: 50px;
        }

        .logo-box {
            background: white;
            width: 50px;
            height: 50px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }

        .logo-box i {
            color: #0d2640;
            font-size: 28px;
        }

        .logo-text h1 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .logo-text p {
            font-size: 11px;
            opacity: 0.8;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .login-title {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 30px;
            line-height: 1.2;
        }

        .login-description {
            font-size: 15px;
            line-height: 1.6;
            opacity: 0.9;
            max-width: 300px;
        }

        /* Right Side - Form */
        .login-right {
            background: white;
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            width: 50%;
            box-shadow: -10px 0 30px rgba(0, 0, 0, 0.1);
        }

        .form-header h2 {
            font-size: 32px;
            font-weight: 600;
            color: #1a4d7d;
            margin-bottom: 30px;
        }

        /* Form Inputs */
        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            color: #555;
            margin-bottom: 10px;
            letter-spacing: 0.5px;
        }

        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            font-size: 14px;
            transition: all 0.3s;
            background: #f5f5f5;
        }

        .form-group input:focus {
            outline: none;
            border-color: #1a7fbb;
            background: white;
            box-shadow: 0 0 0 3px rgba(26, 127, 187, 0.1);
        }

        .form-group input::placeholder {
            color: #999;
        }

        /* Password Group */
        .password-group {
            position: relative;
            display: flex;
            align-items: center;
        }

        .password-group input {
            padding-right: 40px;
        }

        .password-toggle {
            position: absolute;
            right: 12px;
            cursor: pointer;
            font-size: 18px;
            color: #999;
            transition: color 0.3s;
        }

        .password-toggle:hover {
            color: #1a7fbb;
        }

        /* Forgot Password Link */
        .forgot-password {
            position: absolute;
            right: 0;
            top: 0;
            font-size: 12px;
            color: #1a7fbb;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s;
        }

        .forgot-password:hover {
            color: #0d2640;
        }

        /* Remember Me */
        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
            position: relative;
        }

        .remember-me input[type="checkbox"] {
            width: auto;
            margin-right: 8px;
            cursor: pointer;
            accent-color: #1a7fbb;
        }

        .remember-me label {
            margin: 0;
            text-transform: none;
            font-size: 14px;
            cursor: pointer;
        }

        /* Login Button */
        .btn-login {
            width: 100%;
            padding: 13px;
            background: #0d2640;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-login:hover {
            background: #1a4d7d;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(13, 38, 64, 0.3);
        }

        /* Messages */
        .error-message {
            background: #fee;
            color: #c33;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 13px;
            border-left: 4px solid #c33;
            animation: slideDown 0.3s ease-out;
        }

        .success-message {
            background: #efd;
            color: #3c3;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 13px;
            border-left: 4px solid #3c3;
            animation: slideDown 0.3s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Footer */
        .login-footer {
            position: absolute;
            bottom: 20px;
            right: 50px;
            font-size: 12px;
            color: #999;
            text-align: center;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .login-wrapper {
                flex-direction: column;
            }

            .login-left {
                width: 100%;
                padding: 40px 20px;
                justify-content: flex-start;
                padding-top: 40px;
            }

            .login-right {
                width: 100%;
                padding: 40px 20px;
                box-shadow: none;
                border-top: 1px solid #e0e0e0;
            }

            .login-title {
                font-size: 32px;
                margin-bottom: 20px;
            }

            .login-description {
                font-size: 13px;
                margin-bottom: 30px;
            }

            .form-header h2 {
                font-size: 24px;
            }

            .logo-section {
                margin-bottom: 30px;
            }

            .login-footer {
                position: static;
                margin-top: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="login-wrapper">
        <!-- Left Side -->
        <div class="login-left">
            <div class="login-left-content">
                <div class="logo-section">
                    <div class="logo-box">
                        <i class="fas fa-fish"></i>
                    </div>
                    <div class="logo-text">
                        <h1>SIPETANG</h1>
                        <p>Sistem Informasi Pencatatan Hasil Tangkap</p>
                    </div>
                </div>

                <h2 class="login-title">LOGIN</h2>
                <p class="login-description">Lingkungan terukurasi untuk mengelola data maritim dan aset perikanan dengan presisi dan otoritas.</p>
            </div>
            
            <div class="login-footer">
                <p>&copy; 2024 Dinas Perikanan Kabupaten Subang.</p>
                <p>Sekuritas dan kebijakan undang-undang.</p>
            </div>
        </div>

        <!-- Right Side -->
        <div class="login-right">
            <div class="form-header">
                <h2>Selamat Datang</h2>
            </div>

            @if ($errors->any())
                <div class="error-message">
                    <strong>Login gagal!</strong>
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif
            @if (session('success'))
                <div class="success-message">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login.store') }}">
                @csrf

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username"
                        placeholder="Masukan Username" required value="{{ old('username') }}"
                        autofocus>
                </div>

                <div class="form-group">
                    <label for="password">Password
                        <a href="{{ route('password.request') }}" class="forgot-password">Lupa Kata Sandi?</a>
                    </label>
                    <div class="password-group">
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="••••••••" required>
                        <span class="password-toggle" onclick="togglePassword()">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>

                <div class="remember-me">
                    <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">Ingat saya untuk sesi berikutnya</label>
                </div>

                <button type="submit" class="btn-login">
                    LOGIN <i class="fas fa-arrow-right"></i>
                </button>
            </form>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.querySelector('.password-toggle i');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>

</html>
