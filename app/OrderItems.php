<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    protected $fillable = [
        'O_id','name', 'price', 'quantity', 'total'
    ];

    public function Order()
    {
        return $this->hasMany(Order::class);
    }
}
