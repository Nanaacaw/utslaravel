<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = "db_barang";
    // untuk menyederhanakan proses pengelolaan data agar kolom" yang di inisiasi dapat diisi secara mass assignment.
    protected $fillable = ['kode_barang','nama_barang','jenis_varian','qty','harga_jual'];

}
