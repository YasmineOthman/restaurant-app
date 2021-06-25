<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    public function ratrestaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
    public function offerslogs()
    {
        return $this->hasMany(Offerlog::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }

}
