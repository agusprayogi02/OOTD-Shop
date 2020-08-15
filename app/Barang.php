<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $primaryKey = "kd_brg";
    protected $keyType = 'string';
    public $timestamps = true;
    protected $fillable = [
        'kd_brg', 'id', 'kd_ktgr', 'nama', 'harga', 'foto', 'stok', 'diskon', 'created_at'
    ];
    public $incrementing = false;
}
