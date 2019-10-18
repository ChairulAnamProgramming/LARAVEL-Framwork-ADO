<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApdModel extends Model
{
    protected $table = 'tb_apd';
    protected $fillable = ['id_barang', 'id_karyawan', 'tanggal', 'jumlah_pinjam', 'jumlah_terima'];
}
