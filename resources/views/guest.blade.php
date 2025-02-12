@extends('layout.layout')
@section('main-content')
    <section id="hero" class="text-dark text-start container">
        <h1 style="font-size:8rem;" class="text-primary">Bicycle <span class="text-warning">Rent</span></h1>
        <p>Halo, Siap Untuk Sehat? Ayo Segera Rental Sepeda Favoritmu</p>
        <a href="#content" class="btn btn-primary">Lihat Sepeda</a>
    </section>
    <section id="content" class="container mt-5">
        <h3 class="text-center">Sepeda Terbaik Kami</h3>
        <div class="card-list">
            <div class="row d-flex justify-content-center">
                @foreach($bicycle as $b)
                <div class="col-md-4">
                <article class="card maincard m-2">
                    <figure class="card-image">
                        <img src="{{ asset($b->foto) }}" alt="An orange painted blue, cut in half laying on a blue background" />
                    </figure>
                    <div class="card-header">
                        <h4><b>{{ $b->merk}}</b></h4>

                        <br>
                        <p>{{$b->status}}</p>
                    </div>
                    <p class="ms-3">{{$b->tipe}} <br> {{$b->warna}}</p>
                    <p class="ms-3"></p>
                    <div class="card-footer">
                        <div class="card-meta card-meta--views">
                            Rp {{$b->harga_sewa}}
                        </div>
                        <div class="card-meta card-meta--date">

                        </div>
                    </div>
                </article>
                </div>
                @endforeach
            </div>
        </div>  
    </section>
    

    @endsection
