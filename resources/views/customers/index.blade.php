@extends('layout.layout')
@section('main-content')
        <h2 class="text-center m-5">Data Customers</h2>
        <div class="card">
            <div class="card-body">
            <form action="{{ route('customers.store')}}" method="POST">
                @csrf 
                @method('POST')
                <input type="text" placeholder="Nama" name="nama" class="form-control mb-2">
                <textarea name="alamat" id="" placeholder="Alamat" class="form-control mb-2"></textarea>
                <input type="text" placeholder="No Telpon" name="no_telpon" class="form-control mb-2">
                <input type="email" placeholder="Email" name="email" class="form-control mb-3">
                <button class="btn btn-primary mb-2">Simpan Data</button>
            </form>
                <table class="table table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Telpon</th>
                            <th>Email</th>
                            <th>Tanggal Dibuat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($customers as $index => $item)
                        <tr>
                            <td>{{ $index + 1}}</td>
                            <td>{{ $item->nama}}</td>
                            <td>{{ $item->alamat}}</td>
                            <td>{{ $item->no_telpon}}</td>
                            <td>{{ $item->email}}</td>
                            <td>{{ $item->created_at}}</td>
                            <td class="d-flex justify-content-center">
                                <a href="{{ route('customers.edit', $item->id_customer)}}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('customers.destroy', $item->id_customer) }}" method="POST" >
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger ms-2">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan = 7 class="text-center"> Data tidak ada</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
@endsection