@extends('layouts.main')

@section('container')
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px; border-radius: 16px;">
            <div class="text-center mb-4">
                <h3 class="fw-bold text-success">Login to Movie-DB</h3>
                <p class="text-muted">Masuk untuk melanjutkan</p>
            </div>
            <form action="/login" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="bi bi-envelope"></i></span>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="you@example.com" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="bi bi-lock"></i></span>
                        <input type="password" class="form-control" id="password" name="password" placeholder="••••••••"
                            required>
                    </div>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-success">Login</button>
                </div>

                <div class="text-center mt-3">
                    <small class="text-muted">Belum punya akun? <a href="/register"
                            class="text-decoration-none">Daftar</a></small>
                </div>
            </form>
        </div>
    </div>
@endsection
