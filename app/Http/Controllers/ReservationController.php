<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Table;
use App\Models\Restaurant;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\ReservationTable;

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
    public function createreservation($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $tables = Table::all();
        return view ('reservation.create',['restaurant'=>$restaurant,'tables'=>$tables]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Damascus');
        // dd(Carbon::now()->addHour(2));

        // $tabless = Table::all();
        $request->validate([
            // 'day'                     => 'required|date|after:yesterday',
            // 'time'                    => 'date|after:today|after:day - 1|before:tomorrow + 1',
            // 'time'                     =>'datetime|date_format:H:i',
            // 'time'                     =>'required',
            'tables'                   => 'required'
        ]);
        foreach($request->tables as $table){
            $reservation = new Reservation();
            $reservation->table=$table;
            $reservation->time = $request->day;
            // dd(Carbon::now()->between($request->day,$request->day->addHour(2)));
            // $reservation->time = date("h:i A",strtotime( $request->time ));
            $reservation->user_id = 1;
            $reservation->restaurant_id =$request->restaurantid;
            // $reservation->slug = Str::slug($request->place, '-');
            $reservation->save();
            // dd("success");
            // $tab = Table::findOrFail( $reservation->table);
            // dd($tab->id);
            // foreach($tabless as $tab){
            // if($tab->id ==  $reservation->table){
               $restab = new ReservationTable();
            //    $tabb = $tab;
               $restab->reservation_id = $reservation->id;
               $restab->table_id = $reservation->table;
               $restab->save();
               $timezone = date_default_timezone_get();
            // echo "The current server timezone is: "
            //  dd($timezone);
            //    dd($tabb->reservation_id);
            // }
        // }

        }
        echo "<script>confirm('done');</script>";
        // ->where('End_date', '>=', Carbon::now()->toDateString())->get();
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
