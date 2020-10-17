<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    protected $table = 'pembelian';
    public function barang()
    {
        return $this->belongsTo('App\Barang', 'kd_brg');
    }

    public function users()
    {
        return $this->belongsTo('App\User', 'id');
    }

    public function histori()
    {
        return $this->belongsTo('App\Historys', 'kd_transaksi');
    }
}
