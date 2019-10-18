<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TerimaApdModel extends Model
{
    protected $table = 'tb_terima_apd';
    protected $fillable = ['tanggal_terima', 'jumlah_terima', 'id_barang'];
}
