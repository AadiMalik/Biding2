<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category_name()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function win_name()
    {
        return $this->belongsTo(User::class,'win');
    }
    public function package_name()
    {
        return $this->belongsTo(Package::class,'package_id');
    }
}
