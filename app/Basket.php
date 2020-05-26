<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    public function order()
    {
        $this->belongsTo(Order::class);
    }
}
