<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use App\Models\Timesheet;
use App\Models\TimesheetStatuses;
use App\Models\Workday;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($active_day_weekend = null)
    {
         $day_weekends = Timesheet::where('status_id', getStatusId('approved'))
        ->where('is_paid', false)->orderBy('day_weekend', 'DESC')->get()->pluck('day_weekend')->unique();

        $active_day_weekend = $active_day_weekend ? $active_day_weekend : $day_weekends[0];

        $timesheets = Timesheet::leftJoin('workdays', 'timesheets.id', '=', 'workdays.timesheet_id')
        ->leftJoin('rates', 'workdays.shift_id', '=', 'rates.shift_id')
        ->leftJoin('users as clients', 'timesheets.client_id', '=', 'clients.id')
        ->leftJoin('shifts', 'workdays.shift_id', '=', 'shifts.id')
        ->select([
            'timesheets.id as timesheet_id',
            'timesheets.client_id as client_id',
            'timesheets.day_weekend as day_weekend',
            'timesheets.status_id as status_id',
            'timesheets.is_paid as is_paid',
            'workdays.id as workday_id',
            'workdays.total_hours as total_hours',
            'workdays.shift_id as shift_id',
            'rates.bill_rate as bill_rate',
            'clients.name as client_name',
            'shifts.name as shift_name',
        ])
        ->addSelect(DB::raw('(bill_rate * total_hours) as total_amount'))
        ->where('timesheets.status_id', getStatusId('approved'))
        ->where('timesheets.day_weekend', $active_day_weekend)
        ->whereRaw('timesheets.client_id = rates.client_id')
        ->where('timesheets.is_paid', false)
        ->get()
        ->groupBy('timesheet_id');

         return view('invoices.index',compact(['day_weekends','timesheets','active_day_weekend']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('invoices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {   

        return view('invoices.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
