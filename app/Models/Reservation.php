<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
  public function tables()
    {
        return $this->belongsToMany(Table::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }

}
