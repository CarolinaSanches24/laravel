<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['name','description','value','image'];

    protected $casts = [
        'items' => 'array',
    ];
}
