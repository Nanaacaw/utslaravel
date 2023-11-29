<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    //function index untuk melihat data yang telah diinput
    public function index(){
        $listBarang= Barang::all();
        foreach ($listBarang as $key => $barang) {
            $listBarang[$key]->totalHargaJual = $barang->qty * $barang->harga_jual;
            $listBarang[$key]->diskon = $this->hitungDiskon($listBarang[$key]->totalHargaJual);
            $potonganHarga = ($listBarang[$key]->diskon / 100) * $listBarang[$key]->totalHargaJual;
            $listBarang[$key]->hargaSetelahDiskon = $listBarang[$key]->totalHargaJual - $potonganHarga;
        }
        return view('barang.index',['listbarang'=>$listBarang]);
    // return view('barang.index');
    }
    
    public function create (){
        // digunakan untuk menampilkan file form yang ada di folder barang yang terletak di folder views
        return view ('barang.form');
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

    public function formedit($id){
        $barang = Barang::find($id);
        return view ('barang.edit',['barang' => $barang]);
    }

    public function edit(Request $request, $id){
        $barang = Barang::find($id);

        if ($barang){
        $barang -> kode_barang = $request->kode_barang;
        $barang -> nama_barang = $request->nama_barang;
        $barang -> jenis_varian = $request->jenis_varian;
        $barang -> qty = $request->qty;
        $barang -> harga_jual = $request->harga_jual;
        $barang -> save();
        return redirect()->route('home');
        }
    }

    public function hapus($id)
    {
    // Menggunakan metode find untuk menemukan barang berdasarkan ID
    $barang = Barang::find($id);

    if ($barang) {
        // Menghapus barang dari database
        $barang->delete();

        // Mengembalikan ke halaman index dengan pesan sukses
        return redirect()->route('home')->with('success', 'Barang berhasil dihapus');
    } else {
        // Jika barang tidak ditemukan, mengembalikan ke halaman index dengan pesan error
        return redirect()->route('home')->with('error', 'Barang tidak ditemukan');
    }
    }

    
    private function hitungDiskon($totalHargaJual)
    {
        if ($totalHargaJual >= 500000) {
            return 50;
        } elseif ($totalHargaJual >= 200000) {
            return 20;
        } elseif ($totalHargaJual >= 100000) {
            return 10;
        }
        return 0;
    }
}