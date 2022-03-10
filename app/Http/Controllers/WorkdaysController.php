<?php

namespace App\Http\Controllers;

use App\Models\Timesheet;
use App\Models\Workday;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;

class WorkdaysController extends Controller
{
    
    public function index()
    {
        //
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $timesheet = Timesheet::where([
            'employee_id' => Auth::user()->id,
            'client_id' => Auth::user()->client_by_employee->client_id,
            'day_weekend' => Carbon::parse($request->day_weekend)->format('Y-m-d'),
        ])->first();


        if (!$timesheet) {

            $timesheet = Timesheet::create([
                'employee_id' => Auth::user()->id,
                'client_id' => Auth::user()->client_by_employee->client_id,
                'day_weekend' => Carbon::parse($request->day_weekend)->format('Y-m-d')
            ]);

        }


        $in_time = Carbon::parse($request->in_time);
        $out_time = Carbon::parse($request->out_time);
        $total_hours = $out_time->diffInMinutes($in_time) / 60;
        $total_hours = (float) $total_hours - $request->break;

    
        $workday = Workday::create([
            'timesheet_id' => $timesheet->id,
            'date' => Carbon::parse($request->date)->format('Y-m-d'),
            'in_time' => $in_time->format('H:i:s'),
            'out_time' => $out_time->format('H:i:s'),
            'break' => $request->break,
            'shift_id' => $request->shift_id,
            'total_hours' => $total_hours,
            'comment' => $request->comment,
        ]);


        return redirect()->route('timesheets.create', $request->active_week)->with('success', 'Workday added successfully!');
    
    }

    
    public function show(Workday $workday)
    {
        return response($workday, 200);
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        
        $in_time = Carbon::parse($request->in_time);
        $out_time = Carbon::parse($request->out_time);
        $total_hours = $out_time->diffInMinutes($in_time) / 60;
        $total_hours = (float) $total_hours - $request->break;

    
        $workday = Workday::where('id', $id)->update([
            'date' => Carbon::parse($request->date)->format('Y-m-d'),
            'in_time' => $in_time->format('H:i:s'),
            'out_time' => $out_time->format('H:i:s'),
            'break' => $request->break,
            'shift_id' => $request->shift_id,
            'total_hours' => $total_hours,
            'comment' => $request->comment,
        ]);

        
        return redirect()->route('timesheets.create', $request->active_week)->with('success', 'Workday updated successfully!');
    }

    
    public function destroy($id)
    {
        //
    }
}
