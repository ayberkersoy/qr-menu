<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function products()
    {
        return $this->hasMany(Product::class)->where('status', Product::Available);
    }

    public function image()
    {
        return $this->hasOne(Image::class, 'related_id')
            ->where('type', 'category');
    }
}
