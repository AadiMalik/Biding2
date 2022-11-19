<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function product_name()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
