<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MealOrder extends Pivot
{
    use HasFactory;
    // public function meal()
    // {
    //     return $this->belongsTo(Meal::class);
    // }
    // public function order()
    // {
    //     return $this->belongsTo(Order::class);
    // }
}
