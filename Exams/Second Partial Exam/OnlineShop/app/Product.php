<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['name', 'slug', 'image', 'description', 'price'];

    public function preorders()
    {
        return $this->hasMany(Preorder::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
