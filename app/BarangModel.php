<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangModel extends Model
{
    protected $table = 'tb_barang';
    protected $fillable = ['nama_barang', 'stok'];
}
