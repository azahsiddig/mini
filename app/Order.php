<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'O_id', 'O_date', 'user_name','tax','total', 'net'
    ];

    public function OrderItems()
    {
        return $this-> hasMany(OrderItems::class);
    }}
