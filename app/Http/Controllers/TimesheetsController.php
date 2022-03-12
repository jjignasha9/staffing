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
use Symfony\Component\HttpFoundation\Response;
use Storage;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\DB;



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

        $approved_timesheets = Timesheet::leftJoin('workdays', 'timesheets.id', '=', 'workdays.timesheet_id')
        ->select('timesheets.day_weekend')
        ->addSelect(DB::raw('COUNT(DISTINCT(timesheets.id)) as total_timesheets'))
        ->addSelect(DB::raw('SUM(workdays.total_hours) as total_hours'))
        ->where('timesheets.status_id', $status_approved->id)
        ->groupBy('timesheets.day_weekend')
        ->get();


        return view('timesheets.index', compact(['timesheets','approved_timesheets']));
    }

    public function update(Timesheet $timesheet)
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

    public function approved($day_weekend)
    {
        $status_approved = TimesheetStatuses::where('name','approved')->first();

        $timesheets = Timesheet::where('status_id', $status_approved->id)->where('day_weekend', $day_weekend)->get();

        $weekend = $day_weekend;

        return view('timesheets.approved', compact(['timesheets', 'weekend']));
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
        $status_pending = TimesheetStatuses::where('name','pending')->first();

        $submit_status = [
            'submitted_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'status_id' => $status_pending->id,
        ];

        $timesheet_submit = Timesheet::where('id', $timesheet->id)->update($submit_status);

        return redirect()->route('timesheets.create');

        /*$workdays = isset($timesheet->workdays) ? $timesheet->workdays : collect([]);

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

        return view('timesheets.edit', compact(['timesheet', 'weekdays', 'shifts', 'weekend']));*/
    }



    public function createPdf(Timesheet $timesheet)
    {

        $pdf = PDF::loadView('timesheets.pdf', compact('timesheet'));

        $pdf = $pdf->setPaper('a4', 'landscape');

        $save = Storage::put('public/timesheets/timesheet_'.$timesheet->id.'.pdf', $pdf->output());


        return view('timesheets.pdf', compact(['timesheet']));

    }

    public function submit(Request $request, Timesheet $timesheet)
    {   
        $this->createPdf($timesheet);

        $supervisor = User::find($request->supervisor_id);
   
        $file = public_path('storage/timesheets/timesheet_'.$timesheet->id.'.pdf');

        $mailData = [
            'title' => 'Demo Email',
            'url' => 'https://www.positronx.io',
            'file' => $file,
        ];
  
        Mail::to($supervisor->email)->send(new SubmitTimesheetEmail($mailData, $timesheet));
   
        return redirect()->route('timesheets.create')->with('message', 'Mail send successfully!');

        //return view('email.submit_timesheet', compact(['timesheet' , 'mailData']));

    }

    public function show(Timesheet $timesheet)
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

        return view('timesheets.show',compact(['timesheet', 'weekdays', 'shifts', 'weekend']));
    }
}
