<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = ['blog_id', 'username', 'comment_text'];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    public function getRouteKeyName()
    {
        return 'id';
    }
}
