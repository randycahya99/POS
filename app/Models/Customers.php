<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $table = 'customers';

    protected $fillable = [
        'customer_name', 'address', 'phone'
    ];

    public function orders()
    {
        return $this->hasMany(Orders::class);
    }
}
