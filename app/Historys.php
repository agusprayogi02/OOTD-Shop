<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historys extends Model
{
    protected $table = 'historys';
    public function user()
    {
        return $this->belongsTo('App/User', 'id');
    }
}
