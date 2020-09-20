<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Units extends Model
{
    protected $table = 'units';

    protected $fillable = [
        'unit_name', 'descriptions'
    ];

    public function products()
    {
        return $this->hasMany(Products::class);
    }
}
