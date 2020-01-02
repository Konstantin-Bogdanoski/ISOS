<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */
class Company extends Model
{
    protected $table = "companies";

    protected $fillable = ['name', 'slug', 'founded_at', 'description'];

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
