<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Order;
use App\Models\Category;
use App\Models\invoice;
use App\Models\MealOrder;
use App\Models\Restaurant;
use App\Models\Sale;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Carbon\Carbon;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
     public function createorder($id){
        // dd('hello');
        $restaurant = Restaurant::findOrFail($id);
        $categories = Category ::all();
        $meals = Meal::all();
        return view ('order.create',['meals'=>$meals,'restaurant'=>$restaurant,'categories'=>$categories]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'place'                     => 'required|min:4|max:255',
            'notes'                     => 'required|min:4|max:255'
            // 'meals'                     => 'array'
        ]);

       // dd($request->{"quantity"$meal});
        $order = new Order();
        $invoice=new invoice();
        $order->place = $request->place;
        $order->notes = $request->notes;
        $order->user_id = 1;
        $order->restaurant_id = 1;
        $order->discount_id = 1;
        $order->slug = Str::slug($request->place, '-');
        $order->save();
        $invoice->order_id=$order->id;


        $sum = 0;

        foreach($request->meals as $meal){
            $mealorder = new MealOrder();
           
            $mealorder->meal_id=$meal;
            $mealorder->quantity=$request->{"quantity".$meal};
            $mealorder->order_id=$order->id;
            
            $is_sale=Sale::where('meals_id',$mealorder->meal_id)->where('End_date', '>=', Carbon::now()->toDateString())->get();
         
            //dd($is_sale);
            if ($is_sale->count()>0){
               $mealorder->price = (($request->{"price".$meal} - ($is_sale[0]->discount/100 * ($request->{"price".$meal} )) )* $mealorder->quantity) ;
                $sum = (($request->{"price".$meal} - ($is_sale[0]->discount/100 * ($request->{"price".$meal} )) )* $mealorder->quantity) + $sum;

            }
            else 
            $mealorder->price=$request->{"price".$meal} * $mealorder->quantity;

            $sum = ($request->{"price".$meal} * $mealorder->quantity) + $sum;
        }
        $mealorder->save();
        $invoice->count=$sum;
        $invoice->save();
        echo "<script>confirm('Cost is $sum');</script>";
         // foreach ($request->meals as $meal){
        // $order->meals()->sync($request->meals);
        // //  $request->{"quantity".$meal};
        // $sum = ($meal->price * $request->{"quantity".$meal}) + $sum;
        // }
        // foreach ($order->meals as $meal){
        //  dd($request->quantity);
        //   $sum = ($meal->price * $request->quantity) + $sum;
        //   $order->meals()->attach($meal->id,['quantity'=>$request->{"quantity".$meal});
        }
        // if($request->quantity){
        //     $quantity = $request->quantity;
        // }
        // $order->save();
        // $order->meals()->sync($request->meals);
        // if($order->meals()->save($meal, array('quantity' => $quantity))){
        //     dd($quantity);
        //     // return response()->json(['message'=>'User Event Created','data'=>$event],200);
        // }
        //   dd($request->order->pivot->quantity);
                // $order->meals()->attach($meal->id,['quantity'=>$request->quantity]);
        // foreach ($order->meals as $meal)
        //    {
        //     $quantity =  $meal->pivot->quantity;
        //         }
        // $quantity = 0;
        // dd("susssss");
        // $order->meals()->attach(1,['quantity'=>$quantity]);
        // return response()->json(['message'=>'Error','data'=>null],400);
        // dd($order->meals);
        // return redirect()->route('orders.show', $order);
    //     $sum = 0;
    //     foreach ($order->meals as $meal){
    //     //   $sum = $meal->price + $sum;
    // }
        // echo "<script>confirm('Cost is $sum');</script>";
    // return redirect()->route('orders.show', $order);

    public function order(Request $request, Order $order, Meal $meal)

    {
        // $orders = DB::table('orders')
        //     ->leftJoin('meal_order', 'orders.id', '=', 'meal_order.order_id')
        //     ->select('orders.id', 'meal_order.order_id', 'meal_order.quantity')
        //     ->get();
        //     dd('heeeeeeeeeeeeeelo');
        // $quantity = '';
        // if($request->quantity){
        //     $quantity = $request->quantity;
        // }
        // if($order->meals()->save($meal, array('quantity' => $quantity))){
        //     return response()->json(['message'=>'User Event Created','data'=>$event],200);
        // }
        // return response()->json(['message'=>'Error','data'=>null],400);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('order.show',['order'=>$order]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('order.edit',['order' => $order]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'place'                     => 'required|min:4|max:255',
            'notes'                     => 'required|min:4|max:255',
            'meals'                     => 'array'
        ]);
        $order->place = $request->place;
        $order->notes = $request->notes;
         $order->user_id = 1;
        $order->restaurant_id = 1;
        $order->discount_id = 1;
        $order->slug = Str::slug($request->place, '-');
        $order->save();
        $order->meals()->sync($request->meals);
        $sum = 0;
        foreach ($order->meals as $meal){
          $sum = $meal->price + $sum;
        }
        echo "<script>alert('Cost is $sum');</script>";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
