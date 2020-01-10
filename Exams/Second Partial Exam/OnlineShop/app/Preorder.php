<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preorder extends Model
{
    protected $table = 'preorders';

    protected $fillable = ['preorder_user', 'quantity', 'info', 'product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getRouteKeyName()
    {
        return 'id';
    }
}
