<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
    public function jobvacancies()
    {
        return $this->hasMany(JobVacancy::class);
    }
    public function tables()
    {
        return $this->hasMany(Table::class);
    }
    public function ratings()
    {
        return $this->belongsToMany(Rating::class);
    }
    public function offers()
    {
        return $this->hasMany(Offer::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function getImageAttribute($value)
    {
        return asset("storage/{$value}");
    }
}
