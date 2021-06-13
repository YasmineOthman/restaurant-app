<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Order;
use App\Models\MealOrder;
use Illuminate\Http\Request;

class MealOrderController extends Controller
{
    public function show($id)
    {

        $meal = Meal::where('id', $id)->firstorfail();
        // dd($meal->id);
        return view ('mealorder.create',['meal'=>$meal]);
    }

    public function storeorder(Request $request,$id)
    {
        $request->validate([
            'quantity'                    => 'required|numeric'
        ]);
        $mealorder = new MealOrder();
        $mealorder->quantity =$request->quantity;
        $meal = Meal::where('id', $id)->firstorfail();
        $mealorder->meal_id = $meal->id;
        $mealorder->order_id = 1;
        $mealorder->save();
        dd("success");
        return redirect()->route('meals.index', $meal);
    }
    public function totalOrder()
    {
        # code...
    }
    }
