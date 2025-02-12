<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/card.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <style>
          ::-webkit-scrollbar {
            width: 10px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: blue;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: blue;
        }
        #hero {
            /* background: url('{{asset('image/background.png') }}') no-repeat center center/cover; */
            color: white;
            /* text-align: center; */
            padding-bottom:180px;

        }
    </style>
</head>
<body>
<div class="header text-center pt-2 pb-2 text-white sticky-top bg-white">
<h2 class="text-center text-primary mt-3"><b>Bicycle <span class="text-warning">Rent</span></b></h2>
    <div class="NavWrap col-12 d-flex justify-content-center pb-3">
    <nav class="navbar navbar-expand-lg bg-white navbar-light col-11 rounded-pill shadow-lg mt-4">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <img src="{{ asset('image/icon.png')}}" alt="" width="40px" height="40px">
                    <div class="navbar-nav me-auto">
                        <a class="nav-link ms-3" href="{{ route('dashboard')}}"><b>Beranda</b></a>
                        <a class="nav-link" href="{{ route('bicycles.index')}}"><b>Data Sepeda</b></a>
                        <a class="nav-link" href="{{ route('customers.index')}}"><b>Data Pelanggan</b></a>
                        <a class="nav-link" href="{{ route('rentals.index')}}"><b>Data Transaksi</b></a>
                        <a class="nav-link" href="#"><b>Rental</b></a>
                    </div>
                    <!-- Link Login di sebelah kanan -->
                    <div class="ms-auto">
                        <form action="{{ route('logout')}}" method="POST">
                            @csrf 
                            @method('POST')
                            <button class='btn nav-link text-danger'><b>Log Out</b></button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </div>
        
</div>
        
        @yield('main-content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>