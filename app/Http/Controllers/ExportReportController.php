<?php
     
     namespace App\Http\Controllers;

use App\Exports\OrdersuserExport;
use Illuminate\Http\Request;
     use App\Exports\UsersExport;
     use App\Imports\UsersImport;
     use Maatwebsite\Excel\Facades\Excel;

class ExportReportController extends Controller
{
    //
    
   
    public function importExportView()
    {
       return view('Reports');
    }

    /*DB::table("clicks")
	->select("id" ,DB::raw("(COUNT(*)) as total_click"))
        ->orderBy('created_at')
        ->groupBy(DB::raw("MONTH(created_at)"))
        ->get();
        
        ->select(DB::raw('count(id) as `data`'), DB::raw("DATE_FORMAT(created_at, '%m-%Y') new_date"), DB::raw('YEAR(created_at) year, MONTH(created_at) month'))
->groupby('year','month')
->get();
        
        
        */
    public function export($id,$start,$end,$name) 
    {
        return Excel::download(new OrdersuserExport($id,$start,$end,$name), 'ordersofferusers.xlsx');
    }
}
