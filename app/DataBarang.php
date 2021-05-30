<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataBarang extends Model
{
    protected $table = "data_barang";
    protected $primaryKey ="kode_barang";
    protected $fillable =['kode_barang','nama_barang','jumlah','berat','foto'];
}
