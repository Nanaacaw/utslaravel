<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function create (){
        // digunakan untuk menampilkan file form yang ada di folder barang yang terletak di folder views
        return view ('barang.form');
    }
        public function templates(){

        return view('utama');
    }
    public function process(Request $request){
        // membuat kelas baru dari model Barang
        $barang = new Barang();
        // mengisi atribut barang dengan nilai yang diberikan dari formulir
        $barang -> kode_barang = $request->kode_barang;
        $barang -> nama_barang = $request->nama_barang;
        $barang -> jenis_varian = $request->jenis_varian;
        $barang -> qty = $request->qty;
        $barang -> harga_jual = $request->harga_jual;
        // berfungsi untuk menyimpan data barang ke dalam database
        $barang -> save();

        // menghitung total harga jual dari mengalikan qty dan harga_jual
        $totalHargaJual = (int) ($request->qty * $request->harga_jual);

        // logic diskon
        $diskon = 0;
        if ($totalHargaJual >= 500000) {
            $diskon = 50;
        } elseif ($totalHargaJual >= 200000) {
            $diskon = 20;
        } elseif ($totalHargaJual >= 100000) {
            $diskon = 10;
        }
        
        // menghitung harga setelah di diskon sesuai dengan ketentuan logic diatas
        $hargaSetelahDiskon = $totalHargaJual - ($totalHargaJual * ($diskon / 100));

        // mengembalikan view barang.process dengan data barang, total harga jual, diskon, dan harga setelah diskon
        return view('barang.process', [
            'barang' => $barang,
            'totalHargaJual' => $totalHargaJual,
            'diskon' => $diskon,
            'hargaSetelahDiskon' => $hargaSetelahDiskon,
        ]);
    }


}
