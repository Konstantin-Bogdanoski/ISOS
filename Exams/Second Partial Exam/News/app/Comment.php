<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */
class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = ['news_id', 'username', 'comment_text'];

    public function news()
    {
        return $this->belongsTo(News::class);
    }

    public function getRouteKeyName()
    {
        return 'id';
    }
}
