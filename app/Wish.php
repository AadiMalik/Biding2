<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wish extends Model
{
    public function product_name()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
