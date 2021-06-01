<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    use HasFactory;
    public function meal()
    {
     return $this->belongsTo(Meal::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
