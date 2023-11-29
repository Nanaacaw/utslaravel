@extends('utama')
@section('content')
{{-- GET digunakan untuk membaca data, sedangkan POST digunakan untuk mengirim data yang akan diolah oleh server atau
simpelnya untuk menerima hasil inputan data--}}
<form class="forms-sample" action="{{route('edit',['id'=>$barang->id])}}" method="POST" id="form">
    @csrf
    <div class="form-group">
        <label for="kode_barang">Kode Barang</label>
        <input type="text" name="kode_barang" class="form-control" id="kode_barang" placeholder="Input Kode Barang"
            value="{{$barang->kode_barang}}">
    </div>

    <div class="form-group">
        <label for="nama_barang">Nama Barang</label>
        <input type="text" name="nama_barang" class="form-control" id="nama_barang" placeholder="Input Nama Barang"
            value="{{$barang->nama_barang}}">
    </div>

    <div class="form-group">
        <label for="jenis_varian">Jenis Varian</label>
        <input type="text" name="jenis_varian" class="form-control" id="jenis_varian" placeholder="Jenis Varian"
            value="{{$barang->jenis_varian}}">
    </div>

    <div class="form-group">
        <label for="qty">Qty</label>
        <input type="number" name="qty" class="form-control" id="qty" placeholder="Input Quantity"
            value="{{$barang->qty}}">
    </div>

    <div class="form-group">
        <label for="harga_jual">Harga Jual</label>
        <input type="number" name="harga_jual" class="form-control" id="harga_jual" placeholder="Input Harga Jual"
            value="{{$barang->harga_jual}}">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<!-- Bootstrap JS and Popper.js (if needed) -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
@endsection