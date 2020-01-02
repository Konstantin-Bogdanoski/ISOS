<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table = "vehicles";

    protected $fillable = ['mark', 'description', 'slug', 'released_at', 'price', 'created_at', 'updated_at', 'company_id'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
