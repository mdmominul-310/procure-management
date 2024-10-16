<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function reports()
    {
        $report= Report::all(); 
        return view('admin.report.reportlist',compact('report'));
    }
}
