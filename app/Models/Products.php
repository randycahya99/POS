<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'product_code', 'product_name', 'product_brand', 'stock', 'purchase_price', 'selling_price', 'unit_id', 'category_id'
    ];

    public function units()
    {
        return $this->belongsTo(Units::class, 'unit_id');
    }

    public function categories()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

    public function orders()
    {
        return $this->belongsToMany(Orders::class);
    }
}
