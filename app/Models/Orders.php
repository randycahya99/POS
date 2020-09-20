<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'invoice', 'status', 'customer_id', 'user_id', 'total'
    ];

    public function customers()
    {
        return $this->belongsTo(Customers::class);
    }

    public function products()
    {
        return $this->hasMany(Products::class);
    }
}
