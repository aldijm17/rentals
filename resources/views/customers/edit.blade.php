@extends('layout.layout')
@section('main-content')
        <div class="card">
            <div class="card-body">
            <form action="{{ route('customers.update', $customers->id_customer)}}" method="POST">
                @csrf 
                @method('PUT')
                <input type="text" placeholder="Nama" name="nama" class="form-control mb-2" value="{{ old('nama', $customers->nama)}}">
                <textarea name="alamat" id="" placeholder="Alamat" class="form-control mb-2"> {{old('alamat',$customers->alamat)}}</textarea>
                <input type="text" placeholder="No Telpon" name="no_telpon" class="form-control mb-2" value="{{ old('no_telpon', $customers->no_telpon)}}">
                <input type="email" placeholder="Email" name="email" class="form-control mb-3" value="{{ old('email', $customers->email)}}">
                <button class="btn btn-primary mb-2">Simpan Data</button>
            </form>
            </div>
        </div>
@endsection