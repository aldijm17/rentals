<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BikeRent - Penyewaan Sepeda</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #87CEEB;
            --secondary-color: #FFD700;
            --light-color: #ffffff;
        }

        .bg-primary-custom {
            background-color: var(--primary-color);
        }

        .bg-secondary-custom {
            background-color: var(--secondary-color);
        }

        .hero {
            min-height: 100vh;
            background: linear-gradient(rgba(135, 206, 235, 0.9), rgba(135, 206, 235, 0.8)),
                        url('/api/placeholder/1920/1080') center/cover no-repeat;
        }

        .bike-card {
            transition: transform 0.3s ease;
        }

        .bike-card:hover {
            transform: translateY(-5px);
        }

        .service-icon {
            font-size: 2.5rem;
            color: var(--secondary-color);
        }

        .navbar {
            transition: background-color 0.3s ease;
        }

        .navbar.scrolled {
            background-color: var(--primary-color) !important;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-transparent">
        <div class="container">
            <a class="navbar-brand fw-bold text-white" href="#">BikeRent</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#about">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#bikes">Sepeda Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#services">Layanan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero d-flex align-items-center">
        <div class="container text-white">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">Sewa Sepeda Untuk Petualangan Anda</h1>
                    <p class="lead mb-4">Nikmati pengalaman bersepeda yang menyenangkan dengan layanan penyewaan sepeda terbaik.</p>
                    <a href="#bikes" class="btn btn-warning btn-lg">Lihat Sepeda</a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <img src="/api/placeholder/600/400" alt="About Us" class="img-fluid rounded shadow">
                </div>
                <div class="col-lg-6">
                    <h2 class="mb-4">Tentang Kami</h2>
                    <p class="lead">BikeRent adalah penyedia layanan penyewaan sepeda terpercaya dengan pengalaman lebih dari 5 tahun.</p>
                    <p>Kami menyediakan berbagai jenis sepeda berkualitas untuk memenuhi kebutuhan bersepeda Anda. Dari sepeda gunung hingga sepeda lipat, semua tersedia dengan kondisi prima dan terawat.</p>
                    <div class="row mt-4">
                        <div class="col-6">
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-check-circle-fill text-primary me-2"></i>
                                <span>Sepeda Berkualitas</span>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-check-circle-fill text-primary me-2"></i>
                                <span>Harga Terjangkau</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-check-circle-fill text-primary me-2"></i>
                                <span>Pelayanan 24/7</span>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-check-circle-fill text-primary me-2"></i>
                                <span>Free Maintenance</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bikes Section -->
    <section id="bikes" class="py-5 bg-primary-custom">
        <div class="container">
            <h2 class="text-center text-white mb-5">Sepeda Kami</h2>
            <div class="row g-4 d-flex justify-content-center">
                <!-- Bike Card 1 -->
                 @foreach ($bicycle as $b)
                <div class="col-md-6 col-lg-4">
                    <div class="card bike-card h-100">
                        <img src="{{ asset($b->foto) }}" class="card-img-top" alt="Mountain Bike">
                        <div class="card-body">
                            <h5 class="card-title">{{$b->merk}}</h5>
                            <p class="card-text">Cocok untuk medan off-road dan petualangan.</p>
                            <p class="text-primary fw-bold">Rp {{$b->harga_sewa}}/hari</p>
                            <a href="#" class="btn btn-warning">Sewa Sekarang</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Layanan Kami</h2>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="text-center">
                        <i class="bi bi-headset service-icon mb-3"></i>
                        <h5>24/7 Support</h5>
                        <p>Dukungan pelanggan 24 jam setiap hari.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="text-center">
                        <i class="bi bi-tools service-icon mb-3"></i>
                        <h5>Pemeliharaan Gratis</h5>
                        <p>Servis dan pemeliharaan sepeda gratis.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="text-center">
                        <i class="bi bi-geo-alt service-icon mb-3"></i>
                        <h5>Antar Jemput</h5>
                        <p>Layanan antar jemput sepeda tersedia.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="text-center">
                        <i class="bi bi-shield-check service-icon mb-3"></i>
                        <h5>Asuransi</h5>
                        <p>Perlindungan asuransi selama penyewaan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-5 bg-secondary-custom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="mb-4">Hubungi Kami</h2>
                    <p class="lead mb-5">Punya pertanyaan? Silakan hubungi tim kami.</p>
                    <div class="row g-4">
                        <div class="col-md-4">
                            <i class="bi bi-telephone-fill fs-3 mb-3"></i>
                            <p>+62 123 456 789</p>
                        </div>
                        <div class="col-md-4">
                            <i class="bi bi-envelope-fill fs-3 mb-3"></i>
                            <p>info@bikerent.com</p>
                        </div>
                        <div class="col-md-4">
                            <i class="bi bi-whatsapp fs-3 mb-3"></i>
                            <p>+62 987 654 321</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-4 bg-dark text-white">
        <div class="container text-center">
            <p class="mb-0">&copy; 2024 BikeRent. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                document.querySelector('.navbar').classList.add('scrolled');
            } else {
                document.querySelector('.navbar').classList.remove('scrolled');
            }
        });
    </script>
</body>
</html>