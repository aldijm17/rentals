@extends('layout.dashboard')
@section('main-content')
<style>
  
    .card{
        transition: transform 0.4s ease, box-shadow 0.4s ease;
    }
    .card:hover{
        transform: translateY(-10px);
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
    }
    .running-text {
    white-space: nowrap; /* Agar teks tidak turun ke bawah */
    overflow: hidden;
    display: inline-block;
    position: relative;
    animation: runText 10s linear infinite;
    }


    /*@keyframes runText {
        from { transform: translateX(100%); }
        to { transform: translateX(-100%); }
    }*/
</style>
<div class="container">
    @if(Auth::check())
    <p>Selamat datang, <b>{{ Auth::user()->name }}</b>!</p>
    @endif

    <div class="row">
        <div class="col-md-4">
            <h3>Pelanggan Hari Ini</h3>
            <div class="card">
                <div class="card-body">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius, quae nulla dicta nobis et molestiae ut, distinctio architecto dolorem sunt consectetur voluptas fugiat nam voluptatibus consequuntur non odio. Facilis, voluptatum!
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <h3>Transaksi hari ini</h3>
            <div class="card">
                <div class="card-body">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit debitis facere non voluptatem saepe doloribus consequatur fuga possimus quasi unde! Enim cumque aut nostrum dolor architecto sunt laudantium repudiandae ex?
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <h3 class="text-center">Jumlah sepeda</h3>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <h4>Tersedia</h4>
                            <h2 class="text-success">{{ $availableBicycles }}</h2>
                        </div>
                        <div class="col-md-6 text-center">
                            <h4>Disewa</h4>
                            <h2 class="text-danger">{{ $rentedBicycles }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="running-text container-fluid mt-2 text-center">
    <img src="{{ asset('image/runningimage2.png') }}" alt="" width="250px"><h1> Awas Si Imut Lewat!!</h1>
</div> -->
@endsection