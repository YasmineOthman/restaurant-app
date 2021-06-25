<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    public function meals()
    {
        return $this->belongsTo(Meal::class);
    }

    public function saleslog()
    {
        return $this->hasMany(Salelog::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
