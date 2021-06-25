<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    use HasFactory;

    public function order()
     {
        return $this->belongsTo(Order::class);
     }

<<<<<<< HEAD
            
     public function resturant()
     {
         return $this->belongsTo(Restaurant::class);}
=======
     public function getRouteKeyName()
    {
        return 'slug';
    }
>>>>>>> 1e239e25bd82ced27c12c58700dc88eca4296050
}
