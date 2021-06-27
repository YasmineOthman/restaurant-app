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
    public function offerslog()
    {
        return $this->hasMany(Offerlog::class);
    }
   
}
