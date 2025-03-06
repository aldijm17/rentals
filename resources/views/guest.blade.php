@extends('layout.guest')
@section('main-content')
 <!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top bg-transparent" id="mainNavbar">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">BikeRent</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Layanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Kontak</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-person-circle"></i>  acc
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="#">Profil</a></li>
                        <li><a class="dropdown-item" href="#">Pengaturan</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('customer.logout')}}" method="POST">
                                    @csrf 
                                    @method('POST')
                                    <button class='btn nav-link text-danger'><b>Log Out</b></button>
                            </form>    
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>



    <!-- Hero Section -->
    <section id="home" class="hero d-flex align-items-center" style="background: url('{{ asset('image/background.jpg') }}') center/cover no-repeat;">
        <div class="container text-dark text-center" data-aos="fade-up">
            <h1 class="display-4 fw-bold mb-4">Sewa <span class="text-primary">Sepeda</span> Untuk Petualangan Anda </h1>
            <p class="lead mb-4">Nikmati pengalaman bersepeda terbaik dengan harga terjangkau.</p>
            <a href="#bikes" class="btn btn-primary btn-lg shadow">Lihat Sepeda</a>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-5 bg-light" data-aos="fade-right">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img src="" alt="About Us" class="img-fluid rounded shadow">
                </div>
                <div class="col-lg-6">
                    <h2 class="mb-4 text-primary">Tentang Kami</h2>
                    <p>BikeRent adalah penyedia layanan penyewaan sepeda terpercaya dengan pengalaman lebih dari 5 tahun.</p>
                    <div class="row mt-4">
                        <div class="col-6">
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i><span>Sepeda Berkualitas</span>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i><span>Harga Terjangkau</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i><span>Pelayanan 24/7</span>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i><span>Free Maintenance</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bikes Section -->
    <section id="bikes" class="py-5 bg-primary text-white" data-aos="zoom-in">
        <div class="container">
            <h2 class="text-center mb-5"><b>Sepeda Kami</b></h2>
            <div class="row g-4 d-flex justify-content-center">
                 @foreach ($bicycle as $b)
                <div class="col-md-6 col-lg-4">
                    <div class="card bike-card h-100 shadow-lg">
                        <img src="{{ asset($b->foto) }}" class="card-img-top" alt="{{$b->merk}}">
                        <div class="card-body">
                            <h5 class="card-title text-primary">{{$b->merk}}</h5>
                            <p class="card-text">Cocok untuk semua medan.</p>
                            <p class="fw-bold">Rp {{$b->harga_sewa}}/hari</p>
                            <form action="{{ route('rentals.transaction', $b->id_bicycle) }}" method="POST">
                                @csrf
                                <button class="btn btn-warning text-white">Sewa Sekarang</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-5" data-aos="fade-up">
        <div class="container">
            <h2 class="text-center mb-5 text-primary">Layanan Kami</h2>
            <div class="row g-4 text-center">
                <div class="col-md-6 col-lg-3">
                    <i class="bi bi-headset service-icon text-primary display-4"></i>
                    <h5 class="mt-3">24/7 Support</h5>
                    <p>Dukungan pelanggan 24 jam.</p>
                </div>
                <div class="col-md-6 col-lg-3">
                    <i class="bi bi-tools service-icon text-primary display-4"></i>
                    <h5 class="mt-3">Pemeliharaan Gratis</h5>
                    <p>Servis gratis selama penyewaan.</p>
                </div>
                <div class="col-md-6 col-lg-3">
                    <i class="bi bi-geo-alt service-icon text-primary display-4"></i>
                    <h5 class="mt-3">Antar Jemput</h5>
                    <p>Antar jemput sepeda tersedia.</p>
                </div>
                <div class="col-md-6 col-lg-3">
                    <i class="bi bi-shield-check service-icon text-primary display-4"></i>
                    <h5 class="mt-3">Asuransi</h5>
                    <p>Perlindungan selama penyewaan.</p>
                </div>
            </div>
        </div>
    </section>
@endsection

<!-- Tambahkan AOS Animation -->
@section('scripts')
    <script>
        AOS.init({
            duration: 1000,
            once: true,
        });
    </script>
@endsection