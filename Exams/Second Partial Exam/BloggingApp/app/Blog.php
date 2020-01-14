<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    protected $table = 'blogs';

    protected $fillable = ['username', 'title', 'description', 'likes', 'dislikes', 'created_at'];

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getRouteKeyName()
    {
        return 'id';
    }
}
