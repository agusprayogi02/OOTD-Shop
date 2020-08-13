<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $primaryKey = "kd_brg";
    protected $keyType = 'string';
    public $incrementing = false;
}
