<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    protected $fillable = [
        'O_date', 'user_id','tax','total', 'net','delivered'
    ];

    public function orderItems()
    {
        return $this-> belongsToMany(Product::class)->withPivot('qty','price','total')->withTimestamps();
    }

    public function user()
    {
        return $this-> belongsTo(User::class);
    }



}
