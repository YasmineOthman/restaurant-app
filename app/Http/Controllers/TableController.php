<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Models\Restaurant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TableController extends Controller
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
    public function createtable($id)
    {
      $restaurant = Restaurant::findOrFail($id);
    //   dd($restaurant->tables_count);
      return view('table.create',['restaurant'=>$restaurant]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request){
    //     //
    // }
    public function store(Request $request)
    {
        $restaurant = Restaurant::findOrFail($request->restaurantid);
        $request->validate([
            // 'place'                     => 'min:4|max:255',
            'chairs_count'              => 'required|numeric|min:0',
            'status'                    =>'required'
        ]);
        $table = new Table();
        $table->place_table = $request->place;
        $table->chairs_count = $request->chairs_count;
        $table->status = $request->status;
        $table->restaurant_id = $request->restaurantid;
        // $table->slug = Str::slug($request->place, '-');
        $table->save();
        return view('restaurant.show',['restaurant' => $restaurant]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function show(Table $table)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function edit(Table $table)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Table $table)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function destroy(Table $table)
    {
        //
    }
}
