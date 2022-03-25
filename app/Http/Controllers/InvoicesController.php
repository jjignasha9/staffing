<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceItems;
use App\Models\Rate;
use App\Models\Timesheet;
use Carbon\Carbon;
use App\Models\TimesheetStatuses;
use App\Models\Workday;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        ->where('is_invoiced', false)->orderBy('day_weekend', 'DESC')->get()->pluck('day_weekend')->unique();

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
        ->whereRaw('timesheets.client_id=rates.client_id')
        ->whereRaw('timesheets.employee_id = rates.employee_id')
        ->where('timesheets.is_invoiced', false)
        ->get()
        ->groupBy('timesheet_id');

         return view('invoices.index',compact(['day_weekends','timesheets','active_day_weekend']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function draftinvoice()
    {
        return view('invoices.draftinvoice');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $day_weekend = $request->day_weekend;
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
        ->where('timesheets.day_weekend', $day_weekend)
        ->whereRaw('timesheets.client_id=rates.client_id')
        ->whereRaw('timesheets.employee_id = rates.employee_id')
        ->where('timesheets.is_invoiced', false)
        ->get()
        ->groupBy('timesheet_id');

        foreach($timesheets as $timesheet_id => $workdays){
            $total_amount = $workdays->sum('total_amount');
            $status_id = 1;
            $invoice = new Invoice;
            $invoice->timesheet_id = $timesheet_id;
            $invoice->status_id = $status_id; 
            $invoice->terms_id = 2; 
            $invoice->total_amount = $total_amount; 
            $invoice->bill_date = Carbon::now()->format('Y-m-d'); 
            $invoice->due_date = Carbon::now()->addDays(30)->format('Y-m-d'); 
            $invoice->total_amount = $total_amount; 
            $invoice->save();   
            
            foreach($workdays as $workday){
                $invoices = new InvoiceItems;
                $invoices->invoice_id = $invoice->id;
                $invoices->shift_id = $workday->shift_id; 
                $invoices->bill_rate = $workday->bill_rate; 
                $invoices->hours = $workday->total_hours; 
                $invoices->total_amount = $workday->total_amount; 
                $invoices->save();
            }

        }
        return redirect()->route('invoices')->with('message', 'Invoice created successfully!');    
        
       
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
    public function sentinvoice()
    {   

        return view('invoices.sentinvoice');
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
