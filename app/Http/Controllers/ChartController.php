<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    //
    public function Chart()
    {

        $users = array();
        $data = array();
        $orders = DB::table('orders')
            ->select(DB::raw('count(*) as order_count , user_id'))

            ->groupBy('user_id')
            ->get();
        foreach ($orders as $order) {
            array_push($users, $order->user_id);
            array_push($data, $order->order_count);
        }


        //dd($orders);
        return view('chart', ['users' => $users, 'Data' => $data]);
    }
}
