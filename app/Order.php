<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const New = 100;
    const Sent = 200;

    public function baskets()
    {
        return $this->hasMany(Basket::class);
    }
}
