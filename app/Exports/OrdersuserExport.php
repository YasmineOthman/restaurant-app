<?php
  
namespace App\Exports;

use App\Models\Offerlog;
use App\Models\Order;
use App\Models\Salelog;
use App\Models\invoice;
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
private $Restaurant_Id;
private $startdate;
private $enddate;
private $column;
private $sortby;
private $relation;
private $datee;
private $class;
private $column_name;
//use Exportable;
public function __construct($Restaurant_Id,$startdate,$enddate,
$column,$sortby,$relation,$datee,$class,$column_name)


{
    $this->Restaurant_Id=$Restaurant_Id;
    $this->startdate=$startdate;
    $this->enddate=$enddate;
    $this->column=$column;
    $this->sortby=$sortby;
    $this->relation=$relation;
    $this->datee=$datee;
    $this->class=$class;
    $this->column_name=$column_name;


}
    public function collection()
    {
  if ($this->relation=='order'){
    $orders = 

    $this->class::select(
        DB::raw("(sum(count)) as total_inovice"),       
    DB::raw($this->datee)
    )->whereBetween('created_at',[$this->startdate, $this->enddate])->where('restaurant_id',$this->Restaurant_Id)
    ->groupBy($this->sortby)
    ->get();
    
    return $orders;
  }
        $orders = 
        $this->class::select(
        DB::raw('count(*) as order_count'),
        DB::raw($this->column),
        DB::raw($this->datee)
        )->whereBetween('created_at',[$this->startdate, $this->enddate])->where('restaurant_id',$this->Restaurant_Id)
        ->groupBy($this->column)->groupBy($this->sortby)
        ->get();
        foreach ($orders as $order )
        {
          $r=$this->relation;
          $c=$this->column;
          $order->$c=$order->$r->name;
 
    
        }
        return $orders;

       }

       public function headings(): array
       {
    
           return [
               'COUNT_OF_ORDERS',
               $this->column_name,
               'DATE'
           ];
       }
}