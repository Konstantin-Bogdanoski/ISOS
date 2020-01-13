<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */
class News extends Model
{
    protected $table = 'news';

    protected $fillable = ['news_description', 'news_link', 'news_title', 'num_upvotes', 'created_at'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getRouteKeyName()
    {
        return 'id';
    }
}
