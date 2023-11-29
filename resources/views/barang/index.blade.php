@extends('utama')
@section('content')
<div class="row mt-5">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jenis Varian</th>
                            <th>Qty</th>
                            <th>Harga Jual</th>
                            <th>Total Harga</th>
                            <th>Harga Setelah Diskon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listbarang as $barang) <tr>
                            <td>{{$barang->kode_barang}}</td>
                            <td>{{$barang->nama_barang}}</td>
                            <td>{{$barang->jenis_varian}}</td>
                            <td>{{$barang->qty}}</td>
                            <td>{{$barang->harga_jual}}</td>
                            <td>{{$barang->totalHargaJual}}</td>
                            <td>{{$barang->hargaSetelahDiskon}}({{$barang->diskon}}%)</td>
                            <td>
                                <a href="{{route('edit_form',['id'=>$barang->id])}}" class="btn btn-primary">Edit</a>
                                <a href="{{route('hapus', ['id' => $barang->id]) }}" class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection