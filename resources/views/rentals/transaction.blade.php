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
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5 pt-5">
    <h3 class="text-center mb-4">Hai, sebelum itu, isi form ini dulu yuk!</h3>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-body">
                    <form action="{{ route('rentals.addtransaction') }}" method="POST">
                        @csrf 
                        <input type="hidden" name="id_bicycle" value="{{ $bicycle->id_bicycle }}">
                        
                        <div class="mb-3">
                            <label for="id_customer" class="form-label">Nama</label>
                            <select name="id_customer" id="id_customer" class="form-control" required>
                                <option value="">--Pilih Nama--</option>
                                @foreach($customers as $c)
                                    <option value="{{$c->id_customer}}">{{$c->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card shadow-sm">
                                    <img src="{{ asset($bicycle->foto) }}" class="card-img-top" alt="Bike Image">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">{{$bicycle->merk}}</h5>
                                        <p class="text-muted">Cocok untuk medan off-road dan petualangan.</p>
                                        <p class="text-primary fw-bold">Rp {{$bicycle->harga_sewa}} / hari</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="card shadow-sm p-3">
                                    <div class="mb-3">
                                        <label for="tanggal_sewa" class="form-label">Tanggal Sewa</label>
                                        <input type="date" name="tanggal_sewa" id="tanggal_sewa" class="form-control" required>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
                                        <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control" required>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="total_biaya" class="form-label">Total Pembayaran</label>
                                        <input type="number" name="total_biaya" id="total_biaya" class="form-control" placeholder="Masukkan jumlah pembayaran" required>
                                    </div>
                                    
                                    <button class="btn btn-primary w-100">Sewa Sekarang</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
