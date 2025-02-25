<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
       @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
       @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
       *{
        font-family:'inter';
       }
       .card{
        box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.2);
       }
       body {
            overflow: hidden;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        #wrapper {
            display: flex;
            width: 100%;
            height: 100vh;
        }

        #sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background: white;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            transition: all 0.3s;
            z-index: 1030;
            overflow-y: auto;
        }

        #content {
            flex: 1;
            margin-left: 250px;
            display: flex;
            flex-direction: column;
            height: 100vh;
            transition: all 0.3s;
        }

        .navbar {
            position: sticky;
            top: 0;
            z-index: 1020;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            background: white;
        }

        .main-content {
            flex: 1;
            overflow-y: auto;
            padding: 20px;
            background-color: #f8f9fa;
        }

        .sidebar-link {
            padding: 12px 15px;
            color: #444;
            text-decoration: none;
            display: block;
            transition: 0.3s;
            border-radius: 5px;
            margin: 2px 10px;
        }

        .sidebar-link:hover {
            background-color: #f8f9fa;
            color: #0d6efd;
        }

        .sidebar-link i {
            font-size: 1.2rem;
            width: 24px;
            text-align: center;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            #sidebar {
                margin-left: -250px;
            }

            #sidebar.active {
                margin-left: 0;
            }

            #content {
                margin-left: 0;
            }

            #content.sidebar-active {
                margin-left: 250px;
            }
        }

        /* Overlay untuk menutup sidebar saat diklik di luar */
        #overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* background: rgba(0, 0, 0, 0.5); */
            z-index: 1020;
        }

        #overlay.active {
            display: block;
        }
    </style>
</head>
<body>

<div id="wrapper">
    <!-- Sidebar -->
    <div id="sidebar" class="bg-white">
        <div class="p-3">
            <h4 class="text-primary">Admin Panel</h4>
        </div>
        <nav>
            <a href="{{ route('dashboard')}}" class="sidebar-link">
                <i class="bi bi-speedometer2 text-primary"></i>
                <span class="ms-2">Dashboard</span>
            </a>
            <a href="{{ route('customers.index')}}" class="sidebar-link">
                <i class="bi bi-people-fill text-success"></i>
                <span class="ms-2">Pelanggan</span>
            </a>
            <a href="{{ route('bicycles.index')}}" class="sidebar-link">
                <i class="bi bi-box-seam-fill text-warning"></i>
                <span class="ms-2">Data Sepeda</span>
            </a>
            <a href="{{ route('rentals.index')}}" class="sidebar-link">
                <i class="bi bi-graph-up-arrow text-info"></i>
                <span class="ms-2">Data Pelanggan</span>
            </a>
            <a href="#" class="sidebar-link">
                <i class="bi bi-gear-fill text-secondary"></i>
                <span class="ms-2">Settings</span>
            </a>
            <a href="#" class="sidebar-link">
                <i class="bi bi-bell-fill text-danger"></i>
                <span class="ms-2">Notifications</span>
            </a>
        </nav>
    </div>

    <!-- Overlay untuk menutup sidebar -->
    <div id="overlay"></div>

    <!-- Main Content -->
    <div id="content">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <button id="sidebarToggle" class="btn btn-light border me-2">
                    <i class="bi bi-list"></i>
                </button>
                <a class="navbar-brand" href="#">
                    <i class="bi bi-building"></i>
                    <b>Admin</b>
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item me-3">
                            <a class="nav-link" href="#">
                                <i class="bi bi-bell text-warning"></i>
                                <span class="position-absolute top-25 start-75 translate-middle badge rounded-pill bg-danger">
                                    3
                                </span>
                            </a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link" href="#">
                                <i class="bi bi-envelope text-primary"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle text-success"></i>
                                <span class="ms-1">@if(Auth::check())
                                    {{ Auth::user()->name }}
                                    @endif</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Profile</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>Settings</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                <form action="{{ route('logout')}}" method="POST">
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

        <!-- Main Content Area -->
        <div class="main-content">
            @yield('main-content')
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
<script>
    const sidebar = document.getElementById('sidebar');
    const content = document.getElementById('content');
    const overlay = document.getElementById('overlay');
    const sidebarToggle = document.getElementById('sidebarToggle');

    // Toggle Sidebar
    sidebarToggle.addEventListener('click', () => {
        sidebar.classList.toggle('active');
        content.classList.toggle('sidebar-active');
        overlay.classList.toggle('active');
    });

    // Close Sidebar saat klik di luar
    overlay.addEventListener('click', () => {
        sidebar.classList.remove('active');
        content.classList.remove('sidebar-active');
        overlay.classList.remove('active');
    });

    // Close Sidebar saat layar di-resize ke ukuran besar
    window.addEventListener('resize', () => {
        if (window.innerWidth > 768) {
            sidebar.classList.remove('active');
            content.classList.remove('sidebar-active');
            overlay.classList.remove('active');
        }
    });
</script>

</body>
</html>