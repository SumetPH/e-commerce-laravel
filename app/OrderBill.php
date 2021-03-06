<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderBill extends Model
{
    public function products()
    {
        return $this->hasMany('App\OrderProduct');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
