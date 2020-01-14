<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    protected $fillable = ['blog_id', 'url'];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    public function getRouteKeyName()
    {
        return 'id';
    }
}
