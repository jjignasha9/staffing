<?php

namespace App\Http\Controllers;

use App\Mail\SubmitTimesheetEmail;
use App\Models\Shift;
use App\Models\Timesheet;
use App\Models\TimesheetStatuses;
use App\Models\User;
use Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Storage;
use Symfony\Component\HttpFoundation\Response;


class TimesheetsController extends Controller
{
    function __construct() {
        $today = Carbon::now();
        $this->weekend = $today->endOfWeek();
    }

    public function index()
    {   
        
        $status_pending = TimesheetStatuses::where('name','pending')->first();

        $status_approved = TimesheetStatuses::where('name','approved')->first();

        $timesheets = Timesheet::where('status_id', $status_pending->id)->get();

        $timesheetsapp = Timesheet::where('status_id', $status_approved->id)->get();

        return view('timesheets.index', compact(['timesheets','timesheetsapp']));
    }

    public function approve(Timesheet $timesheet)
    {   
        $status_approved = TimesheetStatuses::where('name','approved')->first();

        $update_status = [
            'approved_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'approved_by' => Auth::user()->id,
            'status_id' => $status_approved->id,
        ];

        $timesheet = Timesheet::where('id', $timesheet->id)->update($update_status);

        return redirect()->route('timesheets')->with('message', 'Timesheet approved successfully!');
    }

    public function approvetimesheet(Timesheet $timesheet)
    {
        $weekend = $timesheet->day_weekend;

        $status_approved = TimesheetStatuses::where('name','approved')->first();

        $timesheet_ids = $timesheet->where('id',$timesheet->id)->pluck('id');

        $timesheets = Timesheet::where('status_id', $status_approved->id)->whereIn('id', $timesheet_ids)->get();

        return view('timesheets.approvetimesheet', compact(['timesheets','weekend', 'timesheet']));
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

        return view('timesheets.create', compact(['weekend', 'temp_weekend', 'weekdays', 'shifts', 'timesheet']));
    }


    public function edit(Timesheet $timesheet)
    {

        $workdays = isset($timesheet->workdays) ? $timesheet->workdays : collect([]);

        $weekend = $timesheet->day_weekend;

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

        return view('timesheets.edit', compact(['timesheet', 'weekdays', 'shifts', 'weekend']));
    }



    public function createPdf(Timesheet $timesheet)
    {
        //$pdf = PDF::loadView('timesheets.pdf', compact('timesheet'));

        //Storage::put('public/timesheets/timesheet.pdf', $pdf->output());


        return view('timesheets.pdf', compact(['timesheet']));

    }

    public function submit(Request $request, Timesheet $timesheet)
    {    
         $supervisor_emails = User::whereIn('id' , $request->supervisor_ids)->get()->pluck('email');
   
        $mailData = [
            'title' => 'Demo Email',
            'url' => 'https://www.positronx.io'
        ];


  
        Mail::to($supervisor_emails)->send(new SubmitTimesheetEmail($mailData, $timesheet));


   
        /*return response()->json([
            'message' => 'Email has been sent.'
        ], Response::HTTP_OK);

           $mailData = [
            'title' => 'Demo Email',
            'url' => 'https://www.positronx.io'
        ];*/

        return view('email.submit_timesheet', compact(['timesheet' , 'mailData']));

    }
}
