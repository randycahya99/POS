<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'product_code', 'product_name', 'product_brand', 'stock', 'purchase_price', 'selling_price', 'unit'
    ];

    public function units()
    {
        return $this->belongsTo(Units::class);
    }

    public function categories()
    {
        return $this->belongsTo(Categories::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Orders::class);
    }
}
