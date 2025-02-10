@extends('layout.layout')
@section('main-content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('rentals.update', $rentals->id_rental) }}" method="POST">
                @csrf 
                @method('PUT')
                <select name="id_customer" id="" class="form-control mb-2 ">
                    <option value="id_customer">--Nama--</option>
                    @foreach($customers as $customers)
                    <option value="{{ $customers->id_customer }}" {{ $customers->id_customer == $rentals->id_customer ? 'selected' : '' }}>
                        {{ $customers->nama }}
                    </option>
                    @endforeach  
                </select> 

                <select name="id_bicycle" id="" class="form-control mb-2">
                    <option value="id_bicycle">--Bicycle--</option>
                    @foreach($bicycles as $bicycles)
                    <option value="{{ $bicycles->id_bicycle }}" {{ $bicycles->id_bicycle == $rentals->id_bicycle ? 'selected' : '' }}>
                        {{ $bicycles->merk }} | {{ $bicycles -> tipe}}
                    </option>
                    @endforeach 
                </select> 
                <div class="row">
                <div class="col-md-6">
                    <label for="">Tanggal Sewa : </label>
                    <input type="date" name="tanggal_sewa" class = "form-control mb-2 mt-1" value="{{ old('tanggal_sewa', $rentals->tanggal_sewa) }}">
                </div>
                <div class="col-md-6">
                    <label for="">Tanggal Kembali : </label>
                    <input type="date" name="tanggal_kembali" class="form-control mb-2 mt-1" value="{{ old('tanggal_kembali', $rentals->tanggal_kembali) }}">
                </div>
                </div>
                <input type="number" name="total_biaya" class="form-control mb-2" placeholder="Total Pembayaran" value="{{ old('total_biaya', $rentals->total_biaya) }}">
                <select name="status" id="" class="form-control">
                    <option value="{{ $rentals->status }}">{{ old('status', $rentals->status) }}</option>
                    <option value="disewa">Disewa</option>
                    <option value="dikembalikan">DiKembalikan</option>
                </select>
                <button class="btn btn-primary mt-2 mb-4 col-12">Simpan data</button>
            </form>
        </div>
    </div>
</div>
@endsection