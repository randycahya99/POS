<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'category_code', 'category_name', 'descriptions'
    ];

    public function products()
    {
        return $this->hasMany(Products::class);
    }
}
