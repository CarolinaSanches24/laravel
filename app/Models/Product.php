<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Product extends Model
{
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

    // 🔗 Dono do produto (um para muitos)
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // 🔗 Usuários que compraram esse produto (muitos para muitos)
    public function users()
    {
        return $this->belongsToMany(User::class, 'product_user');
    }


    public function products(){
        return $this->hasMany('App\Model\Product');
    }
    
}
