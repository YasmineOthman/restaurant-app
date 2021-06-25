<?php

namespace App\Http\Controllers;

use App\Exports\OrdersUserExport;
use Illuminate\Http\Request;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class ReportRouteController extends Controller
{
    //

    public function routef(Request $request)
    {
        if($request->get('saleyearC')){ dd($request); }
    //offer reports
         else   if ($request->get('offeryear')){
            $modelname='Offerlog';
            $column='offer_id';
            $column_name='offer_name';
            $sortby='Year';
            $relation='offer';
            $datee="DATE_FORMAT(created_at,'%Y') as " . $sortby;
            $class='App\\Models\\' .$modelname;
                return Excel::download(new OrdersUserExport(1,$request->dateFrom,$request->dateTo,$column,$sortby,$relation,$datee,$class,$column_name), 'ordersofferusers.xlsx');
         }
         else   if ($request->get('offermonth')){
            $modelname='Offerlog';
            $column='offer_id';
            $column_name='offer_name';
            $sortby='Month';
            $relation='offer';
            $datee="DATE_FORMAT(created_at,'%Y %M') as " . $sortby;
            $class='App\\Models\\' .$modelname;
                return Excel::download(new OrdersUserExport(1,$request->dateFrom,$request->dateTo,$column,$sortby,$relation,$datee,$class,$column_name), 'ordersofferusers.xlsx');
         }
         else   if ($request->get('offerday')){
            $modelname='Offerlog';
            $column='offer_id';
            $column_name='offer_name';
            $sortby='Day';
            $relation='offer';
            $datee="DATE_FORMAT(created_at,'%Y %M %D') as " . $sortby;
            $class='App\\Models\\' .$modelname;
                return Excel::download(new OrdersUserExport(1,$request->dateFrom,$request->dateTo,$column,$sortby,$relation,$datee,$class,$column_name), 'ordersofferusers.xlsx');
         }
         //sale reports 
         else   if ($request->get('saleyear')){
            $modelname='Salelog';
            $column='sale_id';
            $column_name='sale_name';
            $sortby='Year';
            $relation='sale';
            $datee="DATE_FORMAT(created_at,'%Y') as " . $sortby;
            $class='App\\Models\\' .$modelname;
                return Excel::download(new OrdersUserExport(1,$request->dateFrom,$request->dateTo,$column,$sortby,$relation,$datee,$class,$column_name), 'ordersofferusers.xlsx');
         }
         else   if ($request->get('salermonth')){
            $modelname='Salelog';
            $column='sale_id';
            $column_name='sale_name';
            $sortby='Month';
            $relation='sale';
            $datee="DATE_FORMAT(created_at,'%Y %M') as " . $sortby;
            $class='App\\Models\\' .$modelname;
                return Excel::download(new OrdersUserExport(1,$request->dateFrom,$request->dateTo,$column,$sortby,$relation,$datee,$class,$column_name), 'ordersofferusers.xlsx');
         }
         else   if ($request->get('saleday')){
            $modelname='Salelog';
            $column='sale_id';
            $column_name='sale_name';
            $sortby='Day';
            $relation='sale';
            $datee="DATE_FORMAT(created_at,'%Y %M %D') as " . $sortby;
            $class='App\\Models\\' .$modelname;
                return Excel::download(new OrdersUserExport(1,$request->dateFrom,$request->dateTo,$column,$sortby,$relation,$datee,$class,$column_name), 'ordersofferusers.xlsx');
         }
  
// invoice report

else   if ($request->get('invoiceyear')){
    $modelname='invoice';
    $column='order_id';
    $column_name='order_name';
    $sortby='Year';
    $relation='order';
    $datee="DATE_FORMAT(created_at,'%Y') as " . $sortby;
    $class='App\\Models\\' .$modelname;
        return Excel::download(new OrdersUserExport(1,$request->dateFrom,$request->dateTo,$column,$sortby,$relation,$datee,$class,$column_name), 'ordersofferusers.xlsx');
 }
 else   if ($request->get('invoicemonth')){
    $modelname='invoice';
    $column='order_id';
    $column_name='order_name';
    $sortby='Month';
    $relation='order';
    $datee="DATE_FORMAT(created_at,'%Y %M') as " . $sortby;
    $class='App\\Models\\' .$modelname;
        return Excel::download(new OrdersUserExport(1,$request->dateFrom,$request->dateTo,$column,$sortby,$relation,$datee,$class,$column_name), 'ordersofferusers.xlsx');
 }
 else   if ($request->get('invoiceday')){
    $modelname='invoice';
    $column='order_id';
    $column_name='order_name';
    $sortby='Day';
    $relation='order';
    $datee="DATE_FORMAT(created_at,'%Y %M %D') as " . $sortby;
    $class='App\\Models\\' .$modelname;
        return Excel::download(new OrdersUserExport(1,$request->dateFrom,$request->dateTo,$column,$sortby,$relation,$datee,$class,$column_name), 'ordersofferusers.xlsx');
 }
    } }

