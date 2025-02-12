@extends('layout.layout')
@section('main-content')
<h2 class="text-center m-5">Data Sepeda</h2>
<div class="container">
<div class="card">
    <div class="card-body">
        <form action="{{ route('bicycles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf 
            @method('POST')
            <input type="text" name="merk" class="form-control mb-3" placeholder="Merk">
            <input type="text" name="tipe" class="form-control mb-3" placeholder="Tipe">
            <!-- <input type="text" name="foto" class="form-control mb-3" placeholder="Tambahkan Foto"> -->
            <input type="file" name="foto" class="form-control mb-3" placeholder="Tambahkan Foto">
            <input type="text" name="warna" class="form-control mb-3" placeholder="Warna">
            <input type="text" name="harga_sewa" class="form-control mb-3" placeholder="Harga Sewa (Hanya Angka)">
            <select name="status" id="" class="form-control mb-3">
                <option value="Tersedia">Tersedia</option>
                <option value="Disewa">Disewa</option>
            </select>
            <button class="btn btn-primary mb-4" onclick="showAlert()">Simpan Data</button>
        </form>
       <table class="table table-bordered">
        <thead class="text-center">
            <tr>
                <th>No</th>
                <th>Merk</th>
                <th>Foto</th>
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
                <td class="text-center"><img src="{{ asset($b->foto)}}" alt="" height="100px" widht="100px"></td>
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
                <td colspan= 8 class="text-center">Data Tidak Ditemukan</td>
            </tr>
            @endforelse
        </tbody>
       </table>
    </div>
</div>
</div>
    <script>
        function showAlert() {
            Swal.fire({
                title: "Berhasil!",
                text: "Data telah disimpan.",
                icon: "success",
                confirmButtonText: "OK"
            });
        }
    </script>
@endsection