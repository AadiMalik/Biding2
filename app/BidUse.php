<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BidUse extends Model
{
    public function user_name()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function product_name()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
