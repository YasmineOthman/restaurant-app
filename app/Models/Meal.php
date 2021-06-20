<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;
    public function components()
    {
        return $this->belongsToMany(Component::class);
    }
    public function category ()
    {
        return $this->belongsTo(Category::class);
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function getImageAttribute($value)
    {
        return asset("storage/{$value}");
    }
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

}
