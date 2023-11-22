@extends('utama')
@section('content')
<h2>Hasil Data Barang</h2>
{{-- membuat tabel untuk mempercantik tampilan dengan boostrap --}}
<table class="table">
    <tr>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Jenis Varian</th>
        <th>Qty</th>
        <th>Harga Jual</th>
    </tr>
    <tr>
        <td>{{ $barang->kode_barang }}</td>
        <td>{{ $barang->nama_barang }}</td>
        <td>{{ $barang->jenis_varian }}</td>
        <td>{{ $barang->qty }}</td>
        <td>{{ $barang->harga_jual }}</td>
    </tr>
</table>

{{-- Informasi total harga setelah di diskonkan --}}
<p>Total Harga Jual: Rp. {{ $totalHargaJual }}</p>
<p>Potongan Harga: {{ $diskon }}%</p>
<p>Harga yang harus dibayar setelah diskon: Rp. {{ $hargaSetelahDiskon }}</p>

<a href="/barang" style="margin-top: 20px; display: block;">Kembali</a>

<!-- Bootstrap JS and Popper.js (if needed) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
@endsection