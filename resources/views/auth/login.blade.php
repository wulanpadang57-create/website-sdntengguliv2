<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin — SD Negeri 1 Tengguli</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root {
            --primary:      #2aad8c;
            --primary-dark: #1f8a6f;
            --cream:        #EDE4C0;
            --text-muted:   #6b7280;
            --border:       #e5e7eb;
        }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            min-height: 100vh;
            display: flex;
            background: #f0fdf8;
        }

        /* LEFT PANEL */
        .left-panel {
            display: none;
            width: 45%;
            background: linear-gradient(145deg, #0a4a3c 0%, #1f8a6f 50%, #2aad8c 100%);
            position: relative;
            overflow: hidden;
            padding: 3rem;
            flex-direction: column;
            justify-content: space-between;
        }
        @media (min-width: 900px) { .left-panel { display: flex; } }
        .left-panel::before {
            content: '';
            position: absolute;
            width: 500px; height: 500px;
            border-radius: 50%;
            background: rgba(255,255,255,.05);
            top: -150px; right: -150px;
        }
        .left-panel::after {
            content: '';
            position: absolute;
            width: 300px; height: 300px;
            border-radius: 50%;
            background: rgba(200,178,126,.12);
            bottom: -80px; left: -80px;
        }
        .left-logo {
            display: flex;
            align-items: center;
            gap: .85rem;
            position: relative;
            z-index: 2;
        }
        .left-logo-icon {
            width: 48px; height: 48px;
            background: rgba(255,255,255,.15);
            border-radius: 14px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.4rem; color: #fff;
            backdrop-filter: blur(6px);
        }
        .left-logo-text { color: #fff; }
        .left-logo-text span { display: block; font-size: .7rem; opacity: .7; font-weight: 400; }
        .left-logo-text strong { font-size: .95rem; font-weight: 700; }
        .left-body { position: relative; z-index: 2; }
        .left-body h1 {
            font-size: clamp(1.8rem, 3vw, 2.5rem);
            font-weight: 800; color: #fff; line-height: 1.2; margin-bottom: 1rem;
        }
        .left-body h1 span { color: var(--cream); }
        .left-body p { color: rgba(255,255,255,.75); font-size: .95rem; line-height: 1.6; max-width: 320px; }
        .left-features { display: flex; flex-direction: column; gap: .75rem; position: relative; z-index: 2; }
        .feature-item {
            display: flex; align-items: center; gap: .75rem;
            color: rgba(255,255,255,.85); font-size: .85rem;
        }
        .feature-item i {
            width: 32px; height: 32px;
            background: rgba(255,255,255,.12);
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            font-size: .8rem; flex-shrink: 0;
        }

        /* RIGHT PANEL */
        .right-panel {
            flex: 1;
            display: flex; align-items: center; justify-content: center;
            padding: 2rem;
            background: #fff;
        }
        .login-box { width: 100%; max-width: 420px; }

        .login-header { text-align: center; margin-bottom: 2.5rem; }
        .login-header .logo-icon {
            display: inline-flex; align-items: center; justify-content: center;
            width: 64px; height: 64px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 18px; font-size: 1.8rem; color: #fff; margin-bottom: 1.25rem;
            box-shadow: 0 8px 24px rgba(42,173,140,.3);
        }
        .login-header h2 { font-size: 1.6rem; font-weight: 800; color: #111827; margin-bottom: .4rem; }
        .login-header p { color: var(--text-muted); font-size: .9rem; }

        .alert-error {
            background: #fef2f2; border: 1px solid #fecaca; color: #dc2626;
            padding: .85rem 1rem; border-radius: 10px; font-size: .85rem;
            margin-bottom: 1.5rem; display: flex; align-items: flex-start; gap: .6rem;
        }
        .alert-success {
            background: #ecfdf5; border: 1px solid #6ee7b7; color: #065f46;
            padding: .85rem 1rem; border-radius: 10px; font-size: .85rem;
            margin-bottom: 1.5rem; display: flex; align-items: flex-start; gap: .6rem;
        }

        .form-group { margin-bottom: 1.25rem; }
        .form-group label { display: block; font-size: .82rem; font-weight: 600; color: #374151; margin-bottom: .45rem; }
        .input-wrapper { position: relative; }
        .input-wrapper .icon-left {
            position: absolute; left: .95rem; top: 50%;
            transform: translateY(-50%); color: #9ca3af; font-size: .85rem; pointer-events: none;
        }
        .input-wrapper input {
            width: 100%;
            padding: .75rem .95rem .75rem 2.6rem;
            border: 1.5px solid var(--border); border-radius: 10px;
            font-size: .9rem; font-family: inherit; color: #111827;
            background: #fafafa; transition: border-color .2s, box-shadow .2s, background .2s; outline: none;
        }
        .input-wrapper input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(42,173,140,.12); background: #fff;
        }
        .input-wrapper input.is-invalid { border-color: #ef4444; }
        .toggle-pw {
            position: absolute; right: .9rem; top: 50%; transform: translateY(-50%);
            background: none; border: none; cursor: pointer;
            color: #9ca3af; font-size: .85rem; padding: .2rem; transition: color .2s;
        }
        .toggle-pw:hover { color: var(--primary); }
        .field-error { color: #ef4444; font-size: .78rem; margin-top: .35rem; }

        .form-options {
            display: flex; align-items: center; margin-bottom: 1.75rem;
        }
        .remember-label {
            display: flex; align-items: center; gap: .5rem;
            cursor: pointer; font-size: .85rem; color: #374151; user-select: none;
        }
        .remember-label input[type=checkbox] { width: 16px; height: 16px; accent-color: var(--primary); cursor: pointer; }

        .btn-login {
            width: 100%; padding: .85rem;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: #fff; border: none; border-radius: 10px;
            font-size: .95rem; font-weight: 700; font-family: inherit; cursor: pointer;
            transition: opacity .2s, transform .15s, box-shadow .2s;
            box-shadow: 0 4px 16px rgba(42,173,140,.35);
            display: flex; align-items: center; justify-content: center; gap: .6rem;
        }
        .btn-login:hover { opacity: .92; transform: translateY(-1px); box-shadow: 0 6px 24px rgba(42,173,140,.45); }
        .btn-login:active { transform: translateY(0); }
        .btn-login:disabled { opacity: .6; cursor: not-allowed; transform: none; }

        .login-footer { text-align: center; margin-top: 2rem; font-size: .8rem; color: #9ca3af; }
        .login-footer a { color: var(--primary); text-decoration: none; font-weight: 600; }
        .login-footer a:hover { text-decoration: underline; }

        @keyframes spin { to { transform: rotate(360deg); } }
        .spinner {
            width: 17px; height: 17px;
            border: 2.5px solid rgba(255,255,255,.4); border-top-color: #fff;
            border-radius: 50%; animation: spin .7s linear infinite; display: none;
        }
        .btn-login.loading .spinner { display: block; }
        .btn-login.loading .btn-text { display: none; }
    </style>
</head>
<body>

    <div class="left-panel">
        <div class="left-logo">
            <div class="left-logo-icon"><i class="fas fa-school"></i></div>
            <div class="left-logo-text">
                <strong>SD Negeri 1 Tengguli</strong>
                <span>Panel Administrasi</span>
            </div>
        </div>
        <div class="left-body">
            <h1>Selamat Datang di <span>Admin Panel</span></h1>
            <p>Kelola konten website sekolah dengan mudah dan efisien dari satu dashboard terpadu.</p>
        </div>
        <div class="left-features">
            <div class="feature-item"><i class="fas fa-newspaper"></i> Kelola berita & artikel sekolah</div>
            <div class="feature-item"><i class="fas fa-images"></i> Manajemen galeri & multimedia</div>
            <div class="feature-item"><i class="fas fa-chalkboard-teacher"></i> Data guru & profil sekolah</div>
            <div class="feature-item"><i class="fas fa-trophy"></i> Prestasi & pengumuman</div>
        </div>
    </div>

    <div class="right-panel">
        <div class="login-box">
            <div class="login-header">
                <div class="logo-icon"><i class="fas fa-user-shield"></i></div>
                <h2>Masuk ke Admin Panel</h2>
                <p>Masukkan kredensial akun administrator Anda</p>
            </div>

            @if (session('status'))
                <div class="alert-success">
                    <i class="fas fa-check-circle"></i>
                    <span>{{ session('status') }}</span>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert-error">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" id="loginForm">
                @csrf

                <div class="form-group">
                    <label for="email">Alamat Email</label>
                    <div class="input-wrapper">
                        <i class="fas fa-envelope icon-left"></i>
                        <input type="email" id="email" name="email"
                            value="{{ old('email') }}"
                            placeholder="admin@example.com"
                            autocomplete="email" autofocus
                            class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
                            required>
                    </div>
                    @error('email')
                        <p class="field-error"><i class="fas fa-circle-exclamation"></i> {{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock icon-left"></i>
                        <input type="password" id="password" name="password"
                            placeholder="••••••••"
                            autocomplete="current-password"
                            class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
                            required>
                        <button type="button" class="toggle-pw" onclick="togglePassword()">
                            <i class="fas fa-eye" id="togglePwIcon"></i>
                        </button>
                    </div>
                    @error('password')
                        <p class="field-error"><i class="fas fa-circle-exclamation"></i> {{ $message }}</p>
                    @enderror
                </div>

                <div class="form-options">
                    <label class="remember-label">
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        Ingat saya selama 30 hari
                    </label>
                </div>

                <button type="submit" class="btn-login" id="submitBtn">
                    <span class="btn-text"><i class="fas fa-sign-in-alt"></i> Masuk</span>
                    <div class="spinner"></div>
                </button>
            </form>

            <div class="login-footer">
                <a href="{{ route('home') }}"><i class="fas fa-arrow-left" style="font-size:.75rem"></i> Kembali ke Website</a>
                <div style="margin-top:.75rem">© {{ date('Y') }} SD Negeri 1 Tengguli</div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const icon  = document.getElementById('togglePwIcon');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }
        document.getElementById('loginForm').addEventListener('submit', function () {
            const btn = document.getElementById('submitBtn');
            btn.classList.add('loading');
            btn.disabled = true;
        });
    </script>
</body>
</html>
