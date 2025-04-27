<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['name','description','value','image'];

    protected $casts = [
        'items' => 'array',
    ];

    protected $dates = ['date'];

    public function scopeSearchTitle(Builder $query, string $search): Builder
    {
        return $query->whereRaw(
            'unaccent(name) ILIKE unaccent(?)',
            ['%' . $search . '%']
        );
    }
}
