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

    public function export() 
    {
        return Excel::download(new OrdersuserExport, 'ordersusers.xlsx');
    }
}
