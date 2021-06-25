<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Order;
use App\Models\Category;
use App\Models\invoice;
use App\Models\MealOrder;
use App\Models\Offer;
use App\Models\Offerlog;
use App\Models\Restaurant;
use App\Models\Sale;
use App\Models\Salelog;
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
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show','createorder']);
    }
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
            'notes'                     => 'required|min:4|max:255',
            // 'meals'                     => 'array'
            'donation'                  => 'required|numeric'
        ]);

       // dd($request->{"quantity"$meal});
        $order = new Order();
        $invoice=new invoice();
        $order->place = $request->place;
        $order->notes = $request->notes;
        $order->user_id = 1;
        $order->restaurant_id = 1;
        $order->discount_id = 1;
        $order->donation = $request->donation;
        $order->slug = Str::slug($request->place, '-');
        $order->save();
        $invoice->order_id=$order->id;


        $sum = 0;
        $is_offer=Offer::where('restaurant_id',$order->restaurant_id)->where('End_date', '>=', Carbon::now()->toDateString())->get();
$check=0;
if ($is_offer->count()>0){
    $sum=$is_offer[0]->cost;
    $invoice->count=$sum;
        $invoice->save();
        $offer_log = new Offerlog();
        $offer_log->offer_id=$is_offer[0]->id;
        $offer_log->order_id=$order->id;
        $offer_log->user_id=1;
        $offer_log->save();


        $check=1;
}
        foreach($request->meals as $meal){
            $mealorder = new MealOrder();

            $mealorder->meal_id=$meal;
            $mealorder->quantity=$request->{"quantity".$meal};
            $mealorder->order_id=$order->id;
            if($check==0) {
            $is_sale=Sale::where('meals_id',$mealorder->meal_id)->where('End_date', '>=', Carbon::now()->toDateString())->get();

            //dd($is_sale);
            if ($is_sale->count()>0){
               $mealorder->price = (($request->{"price".$meal} - ($is_sale[0]->discount/100 * ($request->{"price".$meal} )) )* $mealorder->quantity) ;
                $sum = (($request->{"price".$meal} - ($is_sale[0]->discount/100 * ($request->{"price".$meal} )) )* $mealorder->quantity) + $sum;


                $sale_log = new Salelog();
                $sale_log->sale_id=$is_sale[0]->id;
                $sale_log->order_id=$order->id;
                $sale_log->user_id=1;
                $sale_log->save();

            }
            else {
            $mealorder->price=$request->{"price".$meal} * $mealorder->quantity;

            $sum = ($request->{"price".$meal} * $mealorder->quantity) + $sum;}
            $mealorder->save();
        } else {
            $mealorder->price=0;
        $mealorder->save();
      }}
      if ($check==0){
      $invoice->count=$sum;
      $invoice->save();}

    //   echo "<script>confirm('Cost is $sum');</script>";
      $sum_all = $sum + $request->donation;
        $token = "fxUib1tmro4:APA91bFp2OBuNYGaLPWhC7GuVYJyjg_Ev2ZIRFJzojm3Jz3Nf1AiU6U3N_6XPKP_VQ4ACBHeJyF25d4_qV9qKuCCqOtGahetnRezB6WRQtGhTlqbKqkCbxuKHW-az26k3P_P_w91Ffld";
        $from = "AAAA0cPI-Fg:APA91bHcqHWlYOVTQVxjU6ot1hL3tGT6uhuZ4mzKvNYHxbfd8fCgZ-sAyhOGYZ57P5LWE0e1J0U6ZHDZVkzUbraifhWhWm6gnsb9kbshQ0rtJ8L-LGaUlKv1JgDFKseKUJ5fKqZL7n9J";
        $msg = array(
            'body'  => "Order Meal",
            'title' => "Hi, From {{Auth::user()->name}}",
            'receiver' => 'erw',
            'icon'  => "https://img.icons8.com/dusk/64/ffffff/waiter.png",/*Default Icon*/
            'sound' => 'black.wav'/*Default sound*/
        );
        $fields = array(
            'to'        => $token,
            'notification'  => $msg
        );
        $headers = array(
            'Authorization: key=' . $from,
            'Content-Type: application/json'
        );
        //#Send Reponse To FireBase Server
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        /* dd($result); */
        curl_close($ch);
        echo "<script>confirm('Cost Meal is $sum  And ALL is $sum_all');</script>";
        }
    public function order(Request $request, Order $order, Meal $meal)
    {
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
            'meals'                     => 'array',
            'donation'                  => 'required|numeric'
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
        // echo "<script>alert('Cost is $sum');</script>";
        $sum_all = $sum + $request->donation;
        echo "<script>alert('Cost Meals is $sum
        and All Cost is $sum_all');</script>";
        return redirect()->back();

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
