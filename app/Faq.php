<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    public function category_name()
    {
        return $this->belongsTo(FaqCategory::class,'category_id');
    }
}
