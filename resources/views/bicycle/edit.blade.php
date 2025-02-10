@extends('layout.layout')
@section('main-content')
<h2 class="text-center m-5">Edit Data <span class="text-primary">{{$bicycle->tipe}}</span></h2>
<div class="card">
    <div class="card-body">
        <form action="{{ route('bicycles.update', $bicycle->id_bicycle) }}" method="POST">
            @csrf 
            @method('PUT')
            <input type="text" name="merk" class="form-control mb-3" placeholder="Merk" value="{{ old('merk',$bicycle->merk) }}">
            <input type="text" name="tipe" class="form-control mb-3" placeholder="Tipe" value="{{ old('tipe',$bicycle->tipe) }}">
            <input type="text" name="warna" class="form-control mb-3" placeholder="Warna" value="{{ old('warna',$bicycle->warna) }}">
            <input type="text" name="harga_sewa" class="form-control mb-3" placeholder="Harga Sewa (Hanya Angka)" value="{{ old('harga_sewa',$bicycle->harga_sewa) }}">
            <select name="status" class="form-control mb-3">
                <option value="tersedia" {{ $bicycle->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                <option value="disewa" {{ $bicycle->status == 'disewa' ? 'selected' : '' }}>Disewa</option>
            </select>  
            <button class="btn btn-primary mb-4">Simpan Data</button>
        </form>
    </div>
</div>
@endsection