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
    public function salelogs()
    {
        return $this->hasMany(Salelog::class);
    }
    public function offerlogs()
    {
        return $this->hasMany(Offerlog::class);
    }
    public function invoices()
    {
        return $this->hasMany(inovice::class);
    }
    public function ratings()
    {
        return $this->belongsTo(Rating::class);
    }
    public function offers()
    {
        return $this->hasMany(Offer::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
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
