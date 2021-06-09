<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Order;
use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

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
        // $restaurants = Restaurant::all();
        // $restaurant = Restaurant::where('restaurant_id' , '=' , $id)->get();
        // $meals = Meal::where($category->restaurant_id , '=' , $id)->get();
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
            'notes'                     => 'required|min:4|max:255',
            'meals'                     => 'array'
        ]);
        $order = new Order();
        $order->place = $request->place;
        $order->notes = $request->notes;
         $order->user_id = 1;
        $order->restaurant_id = 1;
        $order->discount_id = 1;
        $order->slug = Str::slug($request->place, '-');
        $order->save();
        $order->meals()->sync($request->meals);
        // dd($order->meals);
        // return redirect()->route('orders.show', $order);
        $sum = 0;
        foreach ($order->meals as $meal){
          $sum = $meal->price + $sum;
        }
        echo "<script>alert('Cost is $sum');</script>";
    // return redirect()->route('orders.show', $order);
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
        //
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
        //
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
