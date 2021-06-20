<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function meals()
    {
        return $this->belongsToMany(Meal::class)->withpivot('quantity');

    }
    public function invoice()
    {
        return $this->hasOne(invoice::class);
    }
    public function offerslog()
    {
        return $this->hasMany(Offerlog::class);
    }
    public function saleslog()
    {
        return $this->hasMany(Salelog::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }

}
