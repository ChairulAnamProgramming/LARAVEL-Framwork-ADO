<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RosterModel extends Model
{
    protected $table = "tb_roster";
    protected $fillable = ["id_karyawan", "status", "tanggal"];
}
