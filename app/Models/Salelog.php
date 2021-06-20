<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salelog extends Model
{
    use HasFactory;


    
    public function sales()
    {
        return $this->belongsToMany(Sale::class);}

        public function users()
        {
            return $this->belongsToMany(User::class);}

            public function orders()
            {
                return $this->belongsToMany(Order::class);
            
            
            }
            
}
