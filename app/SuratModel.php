<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratModel extends Model
{
    protected $table = 'tb_surat';
    protected $fillable = ['no_surat', 'tanggal', 'jenis_surat'];
}
