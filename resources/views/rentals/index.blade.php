@extends('layout.dashboard')
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
                <select name="id_bicycle" id="id_bicycle" class="form-control mb-2" required>
                    <option value="">--Bicycle--</option>
                    @foreach($bicycles as $b)
                    <option value="{{$b->id_bicycle}}" data-price="{{$b->harga_sewa}}">{{$b->merk}} | {{$b->tipe}} - Rp {{ number_format($b->harga_sewa, 0, ',', '.') }}/hari</option>
                    @endforeach
                </select> 
                <div class="row">
                <div class="col-md-6">
                    <label for="">Tanggal Sewa : </label>
                    <input type="date" name="tanggal_sewa" id="tanggal_sewa" class="form-control mb-2 mt-1" required>
                </div>
                <div class="col-md-6">
                    <label for="">Tanggal Kembali : </label>
                    <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control mb-2 mt-1" required>
                </div>
                </div>
                <div class="form-group">
                    <label for="total_biaya">Total Pembayaran :</label>
                    <div class="input-group mb-2">
                        <span class="input-group-text">Rp</span>
                        <input type="number" name="total_biaya" id="total_biaya" class="form-control" readonly>
                    </div>
                    <div id="total_biaya_text" class="form-text">Rp 0</div>
                </div>
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
                <td>Rp {{ number_format($r->total_biaya, 0, ',', '.') }}</td>
                <td>
                    <form action="{{ route('rentals.updateStatus', $r->id_rental) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        @if($r->status == 'disewa')
                            <button type="submit" name="status" value="dikembalikan" class="btn btn-warning btn-sm">Disewa</button>
                        @else
                            <button type="submit" name="status" value="disewa" class="btn btn-success btn-sm">Dikembalikan</button>
                        @endif
                    </form>
                </td>
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

<!-- Tambahkan script JavaScript untuk menghitung total biaya -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const bicycleSelect = document.getElementById('id_bicycle');
    const tanggalSewa = document.getElementById('tanggal_sewa');
    const tanggalKembali = document.getElementById('tanggal_kembali');
    const totalBiaya = document.getElementById('total_biaya');
    const totalBiayaText = document.getElementById('total_biaya_text');
    
    function formatRupiah(angka) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(angka).replace('IDR', 'Rp');
    }
    
    function calculateTotal() {
        if (bicycleSelect.value && tanggalSewa.value && tanggalKembali.value) {
            const selectedOption = bicycleSelect.options[bicycleSelect.selectedIndex];
            const hargaPerHari = parseFloat(selectedOption.dataset.price);
            
            const startDate = new Date(tanggalSewa.value);
            const endDate = new Date(tanggalKembali.value);
            
            // Hitung selisih hari
            const diffTime = Math.abs(endDate - startDate);
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
            
            // Hitung total biaya (minimal 1 hari)
            const jumlahHari = diffDays > 0 ? diffDays : 1;
            const total = hargaPerHari * jumlahHari;
            
            totalBiaya.value = total;
            totalBiayaText.textContent = formatRupiah(total);
        }
    }
    
    bicycleSelect.addEventListener('change', calculateTotal);
    tanggalSewa.addEventListener('change', calculateTotal);
    tanggalKembali.addEventListener('change', calculateTotal);
});
</script>
@endsection
