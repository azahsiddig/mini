<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    protected $fillable = [
        'product_id', 'order_id','price','quantity', 'total'
    ];

    public function Order()
    {
        return $this->hasMany(Order::class);
    }
}
