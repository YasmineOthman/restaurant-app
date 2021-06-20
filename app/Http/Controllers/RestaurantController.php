<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Models\Restaurant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;


class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::all();
        // $restaurants = Restaurant:: where('name', 'like', '%raw%')->get();
        return view('restaurant.index', ['restaurants' => $restaurants]);
    }
    public function search( Request $request)
    {
        $name =  $request->name;
        $search =  $request->search;
        if ($name == null){
            echo "<script>alert('please enter word to search');</script>";
        }
        if($search == "name" or $search == null){
           $restaurants = Restaurant:: where('name', 'like', '%'.$name.'%')->get();
           return view('restaurant.index', ['restaurants' => $restaurants]);
        }
        if($search == "city"){
            $restaurants = Restaurant:: where('city', 'like', '%'.$name.'%')->get();
            return view('restaurant.index', ['restaurants' => $restaurants]);
            }
        if($search == "address"){
             $restaurants = Restaurant:: where('address', 'like', '%'.$name.'%')->get();
             return view('restaurant.index', ['restaurants' => $restaurants]);
             }
          
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd('fadia al matar');
        return view('restaurant.create');
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

            'name'                     => 'required|min:4|max:255',
            'city'                     => 'required|min:4',
            'address'                  => 'required|min:4',
            'description'              => 'required|min:4',
            'image'                    => 'required|file|image',
            'tables_count'             => 'required|numeric|min:0'
            // 'table_id'                 => 'required|numeric|exists:restaurants,id',

        ]);
        $restaurant = new Restaurant();
        $restaurant->name = $request->name;
        $restaurant->image = $request->image;
        $image = $request->image;
        $path = $image->store('restaurant-images', 'public');
        $restaurant->image = $path;
        $restaurant->city = $request->city;
        $restaurant->address = $request->address;
        $restaurant->description= $request->description;
        $restaurant->slug = Str::slug($request->name, '-');
        $restaurant->tables_count = $request->tables_count;
        $restaurant->save();
        // return redirect()->route('restaurants.show', $restaurant);
        // return redirect()->back();

    //   dd($restaurant->tables_count);
        return redirect()->route('res-table.createtable', $restaurant->id);
        // return view('table.create', ['restaurant' => $restaurant]);



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        $tables = Table::all();
        // dd($restaurant->id);
        // $tables = Table::where('restaurant_id' , '=' , $restaurant->id)->get();
        // foreach($tables as $table){
        //        dd($table->id);
        // }
        return view('restaurant.show', ['restaurant' => $restaurant,'tables' => $tables]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {

        return view('restaurant.edit',['restaurant' => $restaurant]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $request->validate([
            'name'                     => 'required|min:4|max:255',
            'city'                     => 'required|min:4',
            'address'                  => 'required|min:4',
            'description'              => 'required|min:4',
            'image'                    => 'required|file|image'
        ]);
        $restaurant->name = $request->name;
        $restaurant->image = $request->image;
        $image = $request->image;
        $path = $image->store('restaurant-images', 'public');
        $restaurant->image = $path;
        $restaurant->city = $request->city;
        $restaurant->address = $request->address;
        $restaurant->description= $request->description;
        $restaurant->slug = Str::slug($request->name, '-');
        $restaurant->save();
        return redirect()->route('restaurants.show', $restaurant);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }

    function Getlocation () {
        //request()->ip();
        //5.0.255.255
        //31.193.79.255
        //static ip for now ..
        $ip ='5.0.255.255';
        $data = Location::get($ip);
      //  dd($data);
            $restaurants = Restaurant:: where('city', 'like', '%'.$data->regionName.'%')->orwhere('address', 'like', '%'.$data->cityName.'%')->get();
            return view('restaurant.index', ['restaurants' => $restaurants]);
          
      // dd($restaurants);
        //echo $data->cityName;
       
       
}
}
