<?php

namespace App\Http\Controllers;

use App\Models\invoice;
use App\Models\Offerlog;
use App\Models\Salelog;

//use Illuminate\Support\Facades\Input;

use DB;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    //
    public function SaleChart(){

        $sales=array();
        $data=array();

        $orders = Salelog::groupBy('sale_id')
->selectRaw('count(*) as total, sale_id')
->get();
//dd($orders);
foreach ($orders as $order) {
    array_push($sales, $order->sale->name);
    array_push($data, $order->total);

   
}

              
          return view('chart',['sales' => $sales, 'Data' => $data]);
        }

public function blde(){
    return view('Reportdatat');
}
        public function OfferChart(){

            $sales=array();
            $data=array();
    
            $orders = Offerlog::groupBy('offer_id')
    ->selectRaw('count(*) as total, offer_id')
    ->get();
    //dd($orders);
    foreach ($orders as $order) {
        array_push($sales, $order->offer->name);
        array_push($data, $order->total);
              /*  $visitors = invoice::select(
                
                    DB::raw("(sum(count)) as total_inovice"),       DB::raw("DATE_FORMAT(created_at,'%M %Y') as months"),
                    DB::raw("DATE_FORMAT(created_at,'%m') as monthKey")
          )//->where('created_at' )
          ->groupBy('months', 'monthKey')
          ->orderBy('months', 'desc')
          ->get();
*/
       
    }
    
                  
              return view('chart',['sales' => $sales, 'Data' => $data]);
            }

            public function InvoicesChart(Request $request){

                if($request->get('invoiceyearC')) {

                $sales=array();
                $data=array();
        


//gruop by day ..
        /*$visitors = invoice::select(
                
                    DB::raw("(sum(count)) as total_inovice"),       
                    DB::raw("DATE_FORMAT(created_at,'%Y %M %D') as Days"),
                    //DB::raw("DATE_FORMAT(created_at,'%m') as monthKey")
          )->where('created_at' )->between($request->dateFrom)->and($request->dateTo)
          ->groupBy('Days')
          ->orderBy('Days', 'desc')
          ->get();

          foreach ($visitors as $order) {
            array_push($sales, $order->Days);
            array_push($data, $order->total_inovice);


          } 

// group by month 
/*
$visitors = invoice::select(
                
    DB::raw("(sum(count)) as total_inovice"),       
    DB::raw("DATE_FORMAT(created_at,'%Y %M') as Month"),
    //DB::raw("DATE_FORMAT(created_at,'%m') as monthKey")
)//->where('created_at' )
->groupBy('Month')
->orderBy('Month', 'desc')
->get();

foreach ($visitors as $order) {
array_push($sales, $order->Month);
array_push($data, $order->total_inovice);


}*/

// group by year 
//dd($request->dateFrom);
   $visitors = invoice::select(
                
    DB::raw("(sum(count)) as total_inovice"),       
    DB::raw("DATE_FORMAT(created_at,'%Y') as Year"),
    //DB::raw("DATE_FORMAT(created_at,'%m') as monthKey")
)->whereBetween('created_at',[DATE($request->dateFrom),DATE($request->dateTo)   ])

//->where('created_at' )
->groupBy('Year')
->orderBy('Year', 'desc')
->get();
//dd($visitors);
foreach ($visitors as $order) {
array_push($sales, $order->Year);
array_push($data, $order->total_inovice);


}








        
                      
                  return view('chart',['sales' => $sales, 'Data' => $data]);}

                  else if($request->get('save')){
                      dd($request->dateTo);
                  }
                }
}
