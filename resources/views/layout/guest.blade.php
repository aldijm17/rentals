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
            --primary-color:#0d6efd;
            --secondary-color: #FFD700;
            --light-color: #ffffff;
            --dark-color:#000000;
        }

        .bg-primary-custom {
            background-color: var(--primary-color);
        }

        .bg-secondary-custom {
            background-color: var(--secondary-color);
        }

        .hero {
    min-height: 100vh;
    background-image: url("{{ asset('image/2new.jpg') }}") center/cover no-repeat;
    position: relative;
}

        .hero::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
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

        .navbar.scrolled {
    background: rgba(255, 255, 255, 0.95) !important;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    transition: background 0.3s ease-in-out;
}

.navbar-brand,
.navbar-nav .nav-link {
    color: #333 !important;
}

.navbar.scrolled .navbar-brand,
.navbar.scrolled .nav-link {
    color: #000 !important;
}


    </style>
</head>
<body>

@yield('main-content')


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
       // Navbar scroll effect
window.addEventListener("scroll", function () {
    let navbar = document.querySelector(".navbar");
    let navLinks = document.querySelectorAll(".nav-link");

    if (window.scrollY > 50) {
        navbar.classList.add("scrolled");
        navLinks.forEach(link => link.classList.add("text-white", "fw-bold"));
    } else {
        navbar.classList.remove("scrolled");
        navLinks.forEach(link => link.classList.remove("text-white", "fw-bold"));
    }
});

window.addEventListener("scroll", function () {
        let navbar = document.getElementById("mainNavbar");
        if (window.scrollY > 50) {
            navbar.classList.add("scrolled");
        } else {
            navbar.classList.remove("scrolled");
        }
    });

    </script>
</body>
</html>