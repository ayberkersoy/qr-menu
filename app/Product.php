<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    const Available = 100;
    const Hidden = 200;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'related_id')
            ->where('type', 'product')
            ->orderBy('order', 'desc');
    }

    public function scopeAvailableProducts()
    {
        return Product::where('status', Product::Available)->get();
    }
}
