<x-authentication>
<style>
    body {
        background-color: #f5f5f5;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        margin: 0;
    }

    [data-theme="dark"] body {
        background-color: #121212;
    }

    .login-card {
        background: #ffffff;
        border: 1px solid #e0e0e0;
        border-radius: 12px;
        padding: 2rem;
        width: 100%;
        max-width: 400px;
    }

    [data-theme="dark"] .login-card {
        background: #1e1e1e;
        border-color: #2e2e2e;
        color: #e0e0e0;
    }

    .login-brand {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 1.75rem;
    }

    .login-brand-icon {
        width: 38px;
        height: 38px;
        border-radius: 8px;
        background-color: #E6F1FB;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
    }

    [data-theme="dark"] .login-brand-icon {
        background-color: #0C447C;
    }

    .login-brand-name {
        font-size: 1rem;
        font-weight: 600;
        color: #185FA5;
    }

    .login-title {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 4px;
    }

    .login-subtitle {
        font-size: 0.875rem;
        color: #888;
        margin-bottom: 1.5rem;
    }

    .form-label {
        font-size: 0.8125rem;
        font-weight: 500;
        color: #555;
        margin-bottom: 5px;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    [data-theme="dark"] .form-label {
        color: #aaa;
    }

    .form-control {
        border-radius: 8px !important;
        font-size: 0.9rem;
        padding: 9px 12px;
    }

    [data-theme="dark"] .form-control {
        background-color: #2a2a2a;
        border-color: #3a3a3a;
        color: #e0e0e0;
    }

    [data-theme="dark"] .form-control::placeholder {
        color: #666;
    }

    [data-theme="dark"] .form-control:focus {
        background-color: #2a2a2a;
        border-color: #378ADD;
        color: #e0e0e0;
        box-shadow: 0 0 0 3px rgba(55, 138, 221, 0.15);
    }

    .btn-login {
        width: 100%;
        padding: 10px;
        background-color: #185FA5;
        border: none;
        border-radius: 8px;
        color: #fff;
        font-size: 0.9rem;
        font-weight: 500;
        margin-top: 1.25rem;
        cursor: pointer;
        transition: background-color 0.2s;
    }

    .btn-login:hover {
        background-color: #0C447C;
        color: #fff;
    }

    .login-footer {
        text-align: center;
        font-size: 0.75rem;
        color: #aaa;
        margin-top: 1.5rem;
    }

    .register-footer {
        text-align: center;
        font-size: 0.8125rem;
        color: #888;
        margin-top: 1rem;
    }

    .register-footer a {
        color: #185FA5;
        text-decoration: none;
    }

    .register-footer a:hover {
        text-decoration: underline;
    }

    @media (max-width: 480px) {
        .login-card {
            margin: 1rem;
            padding: 1.5rem;
        }
    }
</style>

<div class="login-card">

    {{-- Brand --}}
    <div class="login-brand">
        <div class="login-brand-icon">💻</div>
        <span class="login-brand-name">IF21</span>
    </div>

    <h1 class="login-title">Selamat datang</h1>
    <p class="login-subtitle">Masuk ke akun IF21 kamu</p>

    {{-- Alert Error --}}
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
            {{ $errors->first() }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <form action="/login" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">
                📧 Email
            </label>
            <input
                type="email"
                name="email"
                class="form-control @error('email') is-invalid @enderror"
                placeholder="nama@email.com"
                value="{{ old('email') }}"
                required
                autofocus
            >
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">
                🔒 Password
            </label>
            <input
                type="password"
                name="password"
                class="form-control @error('password') is-invalid @enderror"
                placeholder="••••••••"
                required
            >
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn-login">
            Masuk
        </button>
    </form>

    <p class="register-footer">
        Belum punya akun? <a href="/register">Daftar di sini</a>
    </p>

    <p class="login-footer">© {{ date('Y') }} IF21 — Informatika 2026</p>

</div>

</x-authentication>