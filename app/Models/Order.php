<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id']; //nhận tất cả trừ id

    public function orderDetails()
    {
        return $this->hasMany('App\Models\OrderDetail');
    }
}
