<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salelog extends Model
{
    use HasFactory;


<<<<<<< HEAD
    
    public function sale()
=======

    public function sales()
>>>>>>> 1e239e25bd82ced27c12c58700dc88eca4296050
    {
        return $this->belongsTo(Sale::class);}

        public function user()
        {
            return $this->belongsTo(User::class);}

            public function order()
            {
<<<<<<< HEAD
                return $this->belongsTo(Order::class);
            
            
            }

            
            public function resturant()
            {
                return $this->belongsTo(Restaurant::class);}
            
=======
                return $this->belongsToMany(Order::class);
            }

>>>>>>> 1e239e25bd82ced27c12c58700dc88eca4296050
}
