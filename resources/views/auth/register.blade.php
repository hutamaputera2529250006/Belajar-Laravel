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

    .register-card {
        background: #ffffff;
        border: 1px solid #e0e0e0;
        border-radius: 12px;
        padding: 2rem;
        width: 100%;
        max-width: 400px;
    }

    [data-theme="dark"] .register-card {
        background: #1e1e1e;
        border-color: #2e2e2e;
        color: #e0e0e0;
    }

    .register-brand {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 1.75rem;
    }

    .register-brand-icon {
        width: 38px;
        height: 38px;
        border-radius: 8px;
        background-color: #E6F1FB;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
    }

    [data-theme="dark"] .register-brand-icon {
        background-color: #0C447C;
    }

    .register-brand-name {
        font-size: 1rem;
        font-weight: 600;
        color: #185FA5;
    }

    .register-title {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 4px;
    }

    .register-subtitle {
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

    .btn-register {
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

    .btn-register:hover {
        background-color: #0C447C;
        color: #fff;
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
    

    .register-copy {
        text-align: center;
        font-size: 0.75rem;
        color: #aaa;
        margin-top: 1.25rem;
    }

    @media (max-width: 480px) {
        .register-card {
            margin: 1rem;
            padding: 1.5rem;
        }
    }
</style>

<div class="register-card">

    {{-- Brand --}}
    <div class="register-brand">
        <div class="register-brand-icon">💻</div>
        <span class="register-brand-name">IF21</span>
    </div>

    <h1 class="register-title">Buat akun baru</h1>
    <p class="register-subtitle">Daftarkan diri kamu ke IF21</p>

    {{-- Alert Error --}}
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
            <ul class="mb-0 ps-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <form action="/register" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">👤 Nama</label>
            <input
                type="text"
                name="name"
                class="form-control @error('name') is-invalid @enderror"
                placeholder="Nama lengkap"
                value="{{ old('name') }}"
                required
                autofocus
            >
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">📧 Email</label>
            <input
                type="email"
                name="email"
                class="form-control @error('email') is-invalid @enderror"
                placeholder="nama@email.com"
                value="{{ old('email') }}"
                required
            >
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">🔒 Password</label>
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

        <div class="mb-2">
            <label class="form-label">🔒 Konfirmasi Password</label>
            <input
                type="password"
                name="password_confirmation"
                class="form-control"
                placeholder="••••••••"
                required
            >
        </div>

        <button type="submit" class="btn-register">
            Daftar
        </button>
    </form>

    <p class="register-footer">
        Sudah punya akun? <a href="/login">Masuk di sini</a>
    </p>

    <p class="register-copy">© {{ date('Y') }} IF21 — Informatika 2021</p>

</div>

</x-authentication>