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
                @if(Auth::guard('customer')->check())
                    <li class="nav-item"><a class="nav-link text-dark">Hai, {{ Auth::guard('customer')->user()->nama }}</a></li>
                    <li class="nav-item">
                        <form action="{{ route('customer.logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link text-dark">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link text-dark" href="{{ route('customer.login') }}">Login</a></li>
                @endif
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
                        
                        {{-- Menggunakan ID customer yang login --}}
                        @php
                            $loggedCustomer = Auth::guard('customer')->user();
                        @endphp
                        <div class="mb-3">
                            <input type="hidden" class="form-control" value="{{ $loggedCustomer->nama }}" readonly>
                            <input type="hidden" name="id_customer" value="{{ $loggedCustomer->id_customer }}">
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card shadow-sm">
                                    <img src="{{ asset($bicycle->foto) }}" class="card-img-top" alt="Bike Image">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">{{$bicycle->merk}}</h5>
                                        <p class="text-muted">Cocok untuk medan off-road dan petualangan.</p>
                                        <p class="text-primary fw-bold">Rp {{ number_format($bicycle->harga_sewa, 0, ',', '.') }} / hari</p>
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
                                        <div class="input-group">
                                            <span class="input-group-text">Rp</span>
                                            <input type="number" name="total_biaya" id="total_biaya" class="form-control" readonly>
                                        </div>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const hargaPerHari = '{{$bicycle->harga_sewa}}';
    const tanggalSewa = document.getElementById('tanggal_sewa');
    const tanggalKembali = document.getElementById('tanggal_kembali');
    const totalBiaya = document.getElementById('total_biaya');
    const totalBiayaText = document.getElementById('total_biaya_text');
    
    function formatRupiah(angka) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(angka).replace('IDR', 'Rp');
    }
    
    function calculateTotal() {
        if (tanggalSewa.value && tanggalKembali.value) {
            const startDate = new Date(tanggalSewa.value);
            const endDate = new Date(tanggalKembali.value);
            
            // Hitung selisih hari
            const diffTime = Math.abs(endDate - startDate);
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
            
            // Hitung total biaya (minimal 1 hari)
            const jumlahHari = diffDays > 0 ? diffDays : 1 ;
            const total = hargaPerHari * jumlahHari;
            
            totalBiaya.value = total;
            totalBiayaText.textContent = formatRupiah(total);
        }
    }
    
    tanggalSewa.addEventListener('change', calculateTotal);
    tanggalKembali.addEventListener('change', calculateTotal);
});
</script>
@endsection