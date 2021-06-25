<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salelog extends Model
{
    use HasFactory;


    
    public function sale()


    

    {
        return $this->belongsTo(Sale::class);}

        public function user()
        {
            return $this->belongsTo(User::class);}

            public function order()
            {

                return $this->belongsTo(Order::class);
            
            
            }

            
            public function resturant()
            {
                return $this->belongsTo(Restaurant::class);}
            

            }



