@extends('layout.guest')
@section('main-content')
<nav class="navbar navbar-expand-lg fixed-top bg-transparent">
    <div class="container">
        <a class="navbar-brand fw-bold text-dark" href="#">BikeRent</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link text-dark" href="#home">Home</a></li>
                <li class="nav-item"><a class="nav-link text-dark" href="#about">Tentang Kami</a></li>
                <li class="nav-item"><a class="nav-link text-dark" href="#bikes">Sepeda Kami</a></li>
                <li class="nav-item"><a class="nav-link text-dark" href="#services">Layanan</a></li>
                <li class="nav-item"><a class="nav-link text-dark" href="{{ route('customer.login') }}">Login</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Registrasi Customer</h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('customer.register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" 
                                name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Alamat Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                name="email" value="{{ old('email') }}" required autocomplete="email">
                            <div class="form-text">Email Anda akan digunakan untuk login</div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                name="password" required autocomplete="new-password">
                        </div>

                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">Konfirmasi Password</label>
                            <input id="password-confirm" type="password" class="form-control" 
                                name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea id="alamat" class="form-control @error('alamat') is-invalid @enderror" 
                                name="alamat" rows="3" required>{{ old('alamat') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="no_telpon" class="form-label">Nomor Telepon</label>
                            <input id="no_telpon" type="text" class="form-control @error('no_telpon') is-invalid @enderror" 
                                name="no_telpon" value="{{ old('no_telpon') }}" required>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Daftar Sekarang</button>
                        </div>
                        
                        <div class="mt-3 text-center">
                            Sudah punya akun? <a href="{{ route('customer.login') }}" class="text-decoration-none">Login di sini</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection