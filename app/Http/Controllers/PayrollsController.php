<?php

namespace App\Http\Controllers;
use App\Models\Payroll;
use App\Models\PayrollItems;
use App\Models\Rate;
use App\Models\Timesheet;
use App\Models\TimesheetStatuses;
use App\Models\Workday;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PayrollsController extends Controller
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

        $active_day_weekend = $active_day_weekend ? $active_day_weekend : (isset($day_weekends[0]) ? $day_weekends[0] : null);

        if($active_day_weekend) {
            $timesheets = Timesheet::leftJoin('workdays', 'timesheets.id', '=', 'workdays.timesheet_id')
            ->leftJoin('rates', 'workdays.shift_id', '=', 'rates.shift_id')
            ->leftJoin('users as employees', 'timesheets.employee_id', '=', 'employees.id')
            ->leftJoin('shifts', 'workdays.shift_id', '=', 'shifts.id')
            ->select([
                'timesheets.id as timesheet_id',
                'timesheets.employee_id as employee_id',
                'timesheets.day_weekend as day_weekend',
                'timesheets.status_id as status_id',
                'timesheets.is_paid as is_paid',
                'workdays.id as workday_id',
                'workdays.total_hours as total_hours',
                'workdays.shift_id as shift_id',
                'rates.pay_rate as pay_rate',
                'employees.name as employee_name',
                'shifts.name as shift_name',
            ])
            ->addSelect(DB::raw('(pay_rate * total_hours) as total_amount'))
            ->where('timesheets.status_id',  getStatusId('approved'))
            ->where('timesheets.day_weekend', $active_day_weekend)
            ->whereRaw('timesheets.employee_id = rates.employee_id')
            ->where('timesheets.is_paid', false)
            ->get()
            ->groupBy('timesheet_id');
        } else {
            $timesheets = [];
        }
    
        

        //return response($timesheets);

        return view('payrolls.index', compact(['timesheets', 'day_weekends', 'active_day_weekend']));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function paidpayroll()
    {

        $payrolls = Payroll::orderby('id','asc')->get()->groupBy('day_weekend');

         
        return view('payrolls.paid_payroll',compact('payrolls'));
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
        ->leftJoin('users as employees', 'timesheets.employee_id', '=', 'employees.id')
        ->leftJoin('shifts', 'workdays.shift_id', '=', 'shifts.id')
        ->select([
            'timesheets.id as timesheet_id',
            'timesheets.employee_id as employee_id',
            'timesheets.day_weekend as day_weekend',
            'timesheets.status_id as status_id',
            'timesheets.is_paid as is_paid',
            'workdays.id as workday_id',
            'workdays.total_hours as total_hours',
            'workdays.shift_id as shift_id',
            'rates.pay_rate as pay_rate',
            'employees.name as employee_name',
            'shifts.name as shift_name',
        ])
        ->addSelect(DB::raw('(pay_rate * total_hours) as total_amount'))
        ->where('timesheets.status_id',  getStatusId('approved'))
        ->where('timesheets.day_weekend', $day_weekend)
        ->whereRaw('timesheets.employee_id = rates.employee_id')
        ->where('timesheets.is_paid', false)
        ->get()
        ->groupBy('timesheet_id');


        foreach($timesheets as $timesheet_id => $workdays){
            $total_amount = $workdays->sum('total_amount');
            $status_id = payrollStatusId('pending');
            
            $payroll = new Payroll;
            $payroll->timesheet_id = $timesheet_id;
            $payroll->day_weekend = $day_weekend;
            $payroll->total_amount = $total_amount; 
            $payroll->status_id = $status_id; 
            $payroll->save();   
            
            foreach($workdays as $workday){
                $payrolls = new PayrollItems;
                $payrolls->payroll_id = $payroll->id;
                $payrolls->shift_id = $workday->shift_id; 
                $payrolls->pay_rate = $workday->pay_rate; 
                $payrolls->hours = $workday->total_hours; 
                $payrolls->total_amount = $workday->total_amount; 
                $payrolls->save();
            }


           
         Timesheet::where('id', $timesheet_id)->update(['is_paid' => true]); 
        }

        return redirect()->route('payrolls')->with('message', 'Payroll created successfully!');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($payroll)
    {
       $paidpayroll = Timesheet::leftJoin('payrolls', 'timesheets.id', '=', 'payrolls.timesheet_id')
        ->leftJoin('payroll_items', 'payroll_items.payroll_id', '=', 'payrolls.id')
        ->leftJoin('users as employees', 'timesheets.employee_id', '=', 'employees.id')
        ->leftJoin('shifts', 'payroll_items.shift_id', '=', 'shifts.id')
        ->select([
            'employees.name as employee_name',  
            'shifts.name as shift_name',
            'payroll_items.pay_rate as pay_rate',
            'payroll_items.hours as hours',
            'payroll_items.total_amount as total_amount',            
        ])
        ->where('payrolls.day_weekend', $payroll) 
        ->get()
        ->groupBy('employee_name');

        return response($paidpayroll, 200); 

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
