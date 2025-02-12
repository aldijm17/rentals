<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <title>Document</title>
    <style>
        /* Previous styles remain the same */
        :root {
            --primary-color: #0d6efd;
            --hover-color: #0b5ed7;
            --text-color: #2c3e50;
            --transition: all 0.3s ease;
        }

        .cyclist-icon {
            width: 40px;
            height: 40px;
            fill: var(--primary-color);
            transition: var(--transition);
        }

        .cyclist-icon:hover {
            fill: var(--hover-color);
            transform: scale(1.1);
        }

        /* Rest of the previous styles... */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb {
            background: var(--primary-color);
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: var(--hover-color);
        }

        .header {
            background: linear-gradient(135deg, #0d6efd, #0099ff);
            padding: 1rem;
            transition: var(--transition);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .brand-title {
            font-size: 2.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .navbar {
            transition: var(--transition);
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95) !important;
        }

        .navbar:hover {
            transform: translateY(-2px);
        }

        .nav-link {
            position: relative;
            transition: var(--transition);
            color: var(--text-color) !important;
            margin: 0 0.5rem;
            padding: 0.5rem 1rem !important;
            border-radius: 20px;
        }

        .nav-link:hover {
            background: rgba(13, 110, 253, 0.1);
            transform: translateY(-2px);
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 50%;
            background-color: var(--primary-color);
            transition: var(--transition);
            transform: translateX(-50%);
        }

        .nav-link:hover::after {
            width: 80%;
        }

        .navbar-toggler {
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            transition: var(--transition);
        }

        .navbar-toggler:hover {
            background: rgba(13, 110, 253, 0.1);
        }

        .logout-btn {
            background: #ff4757;
            color: white !important;
            border-radius: 20px;
            padding: 0.5rem 1.5rem !important;
            transition: var(--transition);
        }

        .logout-btn:hover {
            background: #ff6b81;
            transform: translateY(-2px);
        }

        @media (max-width: 991px) {
            .NavWrap {
                padding: 0 1rem;
            }
            .navbar {
                padding: 1rem;
            }
            .navbar-collapse {
                background: white;
                border-radius: 15px;
                padding: 1rem;
                margin-top: 1rem;
                box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            }
            .navbar-nav {
                text-align: center;
            }
            .nav-link {
                margin: 0.5rem 0;
                padding: 0.75rem !important;
            }
            .navbar-nav .nav-link {
                border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            }
            .navbar-nav .nav-link:last-child {
                border-bottom: none;
            }
            .logout-btn {
                margin-top: 1rem;
            }
        }

        .animate-nav {
            animation: fadeInDown 0.5s ease-out;
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-5px); }
            100% { transform: translateY(0px); }
        }

        .brand-icon {
            animation: float 3s ease-in-out infinite;
        }
    </style>
</head>
<body>
    <div class="header text-center pt-2 pb-2 text-white sticky-top">
        <h2 class="brand-title text-center mt-3 animate__animated animate__fadeIn">
            <b>Bicycle <span class="text-warning">Rent</span></b>
        </h2>
        <div class="NavWrap col-12 d-flex justify-content-center pb-3">
            <nav class="navbar navbar-expand-lg navbar-light col-11 rounded-pill shadow-lg mt-4 animate-nav">
                <div class="container">
                    <svg class="cyclist-icon brand-icon" viewBox="0 0 640 512">
                        <path d="M400 96a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm27.2 64l-61.8-48.8c-17.3-13.6-41.7-13.8-59.1-.3l-83.1 64.2c-30.7 23.8-28.5 70.8 4.3 91.6L288 305.1V416c0 17.7 14.3 32 32 32s32-14.3 32-32V288c0-10.7-5.3-20.7-14.2-26.6L295 232.9l60.3-48.5L396 217c5.7 4.5 12.7 7 20 7h64c17.7 0 32-14.3 32-32s-14.3-32-32-32H427.2zM56 384a72 72 0 1 1 144 0A72 72 0 1 1 56 384zm440 0a72 72 0 1 1 144 0 72 72 0 1 1 -144 0z"/>
                    </svg>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav me-auto">
                            <a class="nav-link ms-3" href="#"><b>Beranda</b></a>
                            <a class="nav-link" href="#"><b>Data Sepeda</b></a>
                            <a class="nav-link" href="#"><b>Data Pelanggan</b></a>
                            <a class="nav-link" href="#"><b>Data Transaksi</b></a>
                            <a class="nav-link" href="#"><b>Rental</b></a>
                        </div>
                        <div class="ms-auto">
                            <form action="#" method="POST">
                                <button class='btn logout-btn'><b>Log Out</b></button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <div id="main-content"></div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>