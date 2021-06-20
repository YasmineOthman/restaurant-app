<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offerlog extends Model
{
    use HasFactory;

    public function offers()
    {
        return $this->belongsToMany(Offer::class);}

        public function users()
        {
            return $this->belongsToMany(User::class);}

            public function orders()
            {
                return $this->belongsToMany(Order::class);}
}
