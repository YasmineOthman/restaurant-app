<?php
  
namespace App\Exports;
 use DB; 
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class OrdersUserExport implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    //use Exportable;

    public function collection()
    {
        return   $orders = DB::table('orders')
        ->select(DB::raw('count(*) as order_count , user_id'))
        
        ->groupBy('user_id')
        ->get();
        

       }

       public function headings(): array
       {
           return [
               'count',
               'user_id',
           ];
       }
}