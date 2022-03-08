<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use App\Models\Timesheet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Auth;
use Storage;
use Dompdf\Dompdf;

class TimesheetsController extends Controller
{
    function __construct() {
        $today = Carbon::now();
        $this->weekend = $today->endOfWeek();
    }

    public function index()
    {
        return view('timesheets.index');
    }

    public function create($weekend = 0)
    {   
        $temp_weekend = $weekend;

        if ($weekend) {

            $days = abs($weekend) * 7;

            if ($weekend < 0) {

                $weekend = $this->weekend->subDays($days);    

            } else if ($weekend > 0) {

                $weekend = $this->weekend->addDays($days);    

            }

            $weekend = $weekend->format('m/d');   

            
        } else {

            $weekend = $this->weekend->format('m/d');    

        }


        $timesheet = Timesheet::where([
            'employee_id' => Auth::user()->id,
            'client_id' => Auth::user()->client_by_employee->client_id,
            'day_weekend' => Carbon::parse($weekend)->format('Y-m-d')
        ])->first();

       

        $workdays = isset($timesheet->workdays) ? $timesheet->workdays : collect([]);

        $weekdays = [
            [   
                'name' => 'Mon',
                'date' => Carbon::parse($weekend)->subDays(6)->format('m/d'),
                'workday' => isset($workdays) ? $workdays->where('date', Carbon::parse($weekend)->subDays(6)->format('Y-m-d'))->first() : [],
            ], [
              
                'name' => 'Tue',
                'date' => Carbon::parse($weekend)->subDays(5)->format('m/d'),
                'workday' => isset($workdays) ? $workdays->where('date', Carbon::parse($weekend)->subDays(5)->format('Y-m-d'))->first() : [],
            ], [
               
                'name' => 'Wed',
                'date' => Carbon::parse($weekend)->subDays(4)->format('m/d'),
                'workday' => isset($workdays) ? $workdays->where('date', Carbon::parse($weekend)->subDays(4)->format('Y-m-d'))->first() : [],
            ], [
              
                'name' => 'Thu',
                'date' => Carbon::parse($weekend)->subDays(3)->format('m/d'),
                'workday' => isset($workdays) ? $workdays->where('date', Carbon::parse($weekend)->subDays(3)->format('Y-m-d'))->first() : [],
            ], [
               
                'name' => 'Fri',
                'date' => Carbon::parse($weekend)->subDays(2)->format('m/d'),
                'workday' => isset($workdays) ? $workdays->where('date', Carbon::parse($weekend)->subDays(2)->format('Y-m-d'))->first() : [],
            ], [
                 
                'name' => 'Sat',
                'date' => Carbon::parse($weekend)->subDays(1)->format('m/d'),
                'workday' => isset($workdays) ? $workdays->where('date', Carbon::parse($weekend)->subDays(1)->format('Y-m-d'))->first() : [],
            ], [
                
                'name' => 'Sun',
                'date' => Carbon::parse($weekend)->format('m/d'),
                'workday' => isset($workdays) ? $workdays->where('date', Carbon::parse($weekend)->format('Y-m-d'))->first() : [],
            ], 
        ];

       
        

        $shifts = Shift::all();

        return view('timesheets.create', compact(['weekend', 'temp_weekend', 'weekdays', 'shifts']));
    }

    public function createPdf(Timesheet $timesheet)
    {

        $pdf = PDF::loadView('timesheets.pdf', compact('timesheet'));

        //$pdf = $pdf->setPaper('a4', 'landscape');

        $save = Storage::put('public/timesheets/timesheet.pdf', $pdf->output());


        return view('timesheets.pdf', compact(['timesheet']));

    }

}
