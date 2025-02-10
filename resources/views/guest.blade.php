@extends('layout.guest')
@section('main-content')
    <section id="hero" class="text-dark text-start">
        <h1 style="font-size:8rem;" class="text-primary">Bicycle <span class="text-warning">Rent</span></h1>
        <p>Halo, Siap Untuk Sehat? Ayo Segera Rental Sepeda Favoritmu</p>
        <a href="#content" class="btn btn-primary">Lihat Sepeda</a>
    </section>
    <section id="content" class="container mt-5">
        <h3 class="text-center">Sepeda Terbaik Kami</h3>
        <div class="row text-center mt-4">
            <div class="col-md-4">
                <div class="card">
                    <img src="https://source.unsplash.com/400x300/?mountain-bike" class="card-img-top" alt="Sepeda Gunung">
                    <div class="card-body">
                        <h5 class="card-title">Sepeda Gunung</h5>
                        <p class="card-text">Cocok untuk petualangan di medan berat.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://source.unsplash.com/400x300/?road-bike" class="card-img-top" alt="Sepeda Balap">
                    <div class="card-body">
                        <h5 class="card-title">Sepeda Balap</h5>
                        <p class="card-text">Cepat dan ringan untuk kecepatan tinggi.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://source.unsplash.com/400x300/?city-bike" class="card-img-top" alt="Sepeda Kota">
                    <div class="card-body">
                        <h5 class="card-title">Sepeda Kota</h5>
                        <p class="card-text">Nyaman untuk berkendara di perkotaan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    @endsection
