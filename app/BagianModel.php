<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BagianModel extends Model
{
    protected $table = 'tb_bagian';
    protected $fillable = ['nama_bagian', 'status'];
}
