@extends('layout.dashboard')

@section('main-content')
<style>
    .responsive-table {
    overflow-x: auto;
    display: block;
    max-width: 100%;
    }
    
    .bicycle-add-button{
        transition: background-color 0.3s ease;
        color:rgb(52, 124, 202);
    }
    .bicycle-add-button:hover{
        background-color:rgb(52, 124, 202);
        color:white;
        box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.2);
    }
</style>
<div class="container">
    <h1 class="text-center mb-3">Customers</h1>
    <div class="row">
        <div class="col-md-6 " height="200">

            <div class="card" >
                <div class="card-body pb-5">
                    <form action="{{ route('customers.store')}}" method="POST">
                        @csrf 
                        @method('POST')
                        <input type="text" placeholder="Nama" name="nama" class="form-control mb-2">
                        <textarea name="alamat" id="" placeholder="Alamat" class="form-control mb-2"></textarea>
                        <input type="text" placeholder="No Telpon" name="no_telpon" class="form-control mb-2">
                        <input type="email" placeholder="Email" name="email" class="form-control mb-3">
                        <button class="btn border-primary mt-2 col-12 bicycle-add-button"><i class="bi bi-floppy"></i> Simpan Data</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card ">
                <div class="card-body text-center">
                    @if(session('notification'))
                        <div class="alert alert-primary" style="height: 50px;" id="notif-alert">
                            {{ session('notification') }}
                        </div>
                    @else
                        <div class="text-muted running-text">No Notification yet</div>
                    @endif
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body text-center">
                <canvas id="customersChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>
        <div class="card mt-3 ">
            <div class="card-body table-responsive">
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
                                <a href="{{ route('customers.edit', $item->id_customer)}}" class="btn btn-warning"><i class="bi bi-pencil"></i> Edit</a>
                                <form action="{{ route('customers.destroy', $item->id_customer) }}" method="POST" >
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger ms-2"><i class="bi bi-trash"></i> Hapus</button>
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
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var ctx = document.getElementById('customersChart').getContext('2d');

        var customersChart = new Chart(ctx, {
            type: 'bar', // Bisa juga 'bar'
            data: {
                labels: {!! json_encode($dates) !!}, // Tanggal
                datasets: [{
                    label: 'Jumlah Customers',
                    data: {!! json_encode($counts) !!}, // Jumlah pelanggan
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    });
</script>
@endsection