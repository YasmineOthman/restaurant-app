<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Models\Restaurant;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
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
    public function createreservation($id,$idd)
    {
        $restaurant = Restaurant::findOrFail($id);
        // $tables = Table::all();
        $table = Table::findOrFail($idd);
        return view ('reservation.create',['restaurant'=>$restaurant,'table'=>$table]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->tableid);
        $request->validate([
            'start_time'                     => 'required|date|max:255',
            'end_time'                       => 'required|date|max:255'
            // 'meals'                     => 'array'
        ]);
        $reservation = new Reservation();
        $reservation->start_time = $request->start_time;
        $reservation->end_time = $request->end_time;
        $reservation->user_id = 1;
        $reservation->restaurant_id =$request->restaurantid;
        $reservation->slug = Str::slug($request->place, '-');
        $reservation->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
