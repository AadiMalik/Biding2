<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function product_name()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
    public function promo_name()
    {
        return $this->belongsTo(PromoCode::class,'promo_code');
    }
}
