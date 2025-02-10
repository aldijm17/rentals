@extends('layout.layout')
@section('main-content')
<h2 class="text-center m-5">Data Sepeda</h2>
<div class="container">
<div class="card">
    <div class="card-body">
        <form action="{{ route('bicycles.store') }}" method="POST">
            @csrf 
            @method('POST')
            <input type="text" name="merk" class="form-control mb-3" placeholder="Merk">
            <input type="text" name="tipe" class="form-control mb-3" placeholder="Tipe">
            <input type="text" name="warna" class="form-control mb-3" placeholder="Warna">
            <input type="text" name="harga_sewa" class="form-control mb-3" placeholder="Harga Sewa (Hanya Angka)">
            <select name="status" id="" class="form-control mb-3">
                <option value="tersedia">Tersedia</option>
                <option value="disewa">Disewa</option>
            </select>
            <button class="btn btn-primary mb-4">Simpan Data</button>
        </form>
       <table class="table table-bodered">
        <thead class="text-center">
            <tr>
                <th>No</th>
                <th>Merk</th>
                <th>Tipe</th>
                <th>Warna</th>
                <th>Harga Sewa</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse( $bicycle as $index => $b)
            <tr>
                <td>{{ $index + 1}}</td>
                <td>{{ $b->merk}}</td>
                <td>{{ $b->tipe}}</td>
                <td>{{ $b->warna}}</td>
                <td>{{ $b->harga_sewa}}</td>
                <td>{{ $b->status}}</td>
                <td class="d-flex justify-content-center">
                    <a href="{{ route('bicycles.edit', $b->id_bicycle)}}" class="btn btn-warning me-2">Edit</a>
                    <form action="{{ route('bicycles.destroy', $b->id_bicycle) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>

            @empty
            <tr>
                <td colspan= 6 class="text-center">Data Tidak Ditemukan</td>
            </tr>
            @endforelse
        </tbody>
       </table>
    </div>
</div>
</div>
@endsection