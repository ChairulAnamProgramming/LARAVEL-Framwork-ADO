<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MergeModel extends Model
{
    protected $table = 'tb_merge';
    protected $fillable = ['id_karyawan', 'in', 'in_keterangan', 'out', 'jam_kerja', 'r', 'jam_pokok', 'lembur', 'n1_5', 'n2', 'n3', 'n4', 'jam_lembur', 'tanggal', 'status_onoff'];
}
