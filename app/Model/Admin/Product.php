<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //protected $table = "products";

    public function getDiscountAttribute()
    {
        return $this->selling_price - $this->discount_price;    
	}
	protected $appends = ['discount'];
}
