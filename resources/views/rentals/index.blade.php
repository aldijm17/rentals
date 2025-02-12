@extends('layout.layout')
@section('main-content')
<div class="container">
    <h1 class="mt-5 mb-4"><b>Form Rental</b></h1>
    <div class="card mb-5 shadow-lg">
        <div class="card-body">
            <form action="{{ route('rentals.store')}}" method="POST">
                @csrf 
                @method('POST')
                <select name="id_customer" id="" class="form-control mb-2 " required>
                    <option value="">--Nama--</option>
                    @foreach($customers as $c)
                    <option value="{{$c->id_customer}}">{{$c->nama}}</option>
                    @endforeach
                </select> 
                <select name="id_bicycle" id="" class="form-control mb-2" required>
                    <option value="">--Bicycle--</option>
                    @foreach($bicycles as $b)
                    <option value="{{$b->id_bicycle}}">{{$b->merk}} | {{$b->tipe}}</option>
                    @endforeach
                </select> 
                <div class="row">
                <div class="col-md-6">
                    <label for="">Tanggal Sewa : </label>
                    <input type="date" name="tanggal_sewa" class = "form-control mb-2 mt-1" required>
                </div>
                <div class="col-md-6">
                    <label for="">Tanggal Kembali : </label>
                    <input type="date" name="tanggal_kembali" class="form-control mb-2 mt-1" required>
                </div>
                </div>
                <input type="number" name="total_biaya" class="form-control mb-2" placeholder="Total Pembayaran" required>
                <select name="status" id="" class="form-control" required>
                    <option value="">--status--</option>
                    <option value="disewa">Disewa</option>
                    <option value="dikembalikan">DiKembalikan</option>
                </select>
                <button class="btn btn-primary mt-2 mb-4 col-12">Simpan data</button>
            </form>
        </div>
    </div>
    <h2>Data Rental Pengguna</h2>
    <div class="card shadow-lg">
    <div class="card-body">
    <table class="table table-bordered">
        <thead class="text-center">
            <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Merk Sepeda</th>
                <th>Tanggal Sewa</th>
                <th>Tanggal Kembali</th>
                <th>Total Pembayaran</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($rentals as $index => $r)
            <tr>
                <td>{{$index + 1}}</td>
                <td>{{$r->customers->nama}}</td>
                <td>{{$r->bicycles->merk}}</td>
                <td>{{$r->tanggal_sewa}}</td>
                <td>{{$r->tanggal_kembali}}</td>
                <td>{{$r->total_biaya}}</td>
                <td>{{$r->status}}</td>
                <td class="d-flex justify-content-center">
                    <a href="{{ route('rentals.edit', $r->id_rental) }}" class="btn btn-warning me-3 text-white"><i class="bi bi-pencil"></i></a>
                    <form action="{{ route('rentals.destroy',$r->id_rental) }}" method="POST">
                        @csrf 
                        @method('DELETE')
                        <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan= 8 class="text-center">Data Kosong</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    </div>
</div> 
</div>

@endsection