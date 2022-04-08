<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Invoice;
use App\Models\Payroll;
use App\Models\Shift;
use App\Models\Timesheet;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::User()->role == '2')
        {
            return redirect()->route('timesheets.create');
        } elseif(Auth::User()->role == '4') {
            return redirect()->route('timesheets');
        } else {

                $shifts = Shift::all();
                $timesheets = Timesheet::all();
                $payrolls = Payroll::all();
                $invoices = Invoice::all();
                $bookings = Booking::all();
                $employees = User::where('role', '2')->get();
                $clients = User::where('role', '3')->get();
                $supervisors = User::where('role', '4')->get();

                $payrollData = Payroll::select(DB::raw('DATE(day_weekend) as date'), DB::raw('sum(total_amount) as total'))
                ->groupBy('date')
                ->get();

                $invoiceData = Invoice::select(DB::raw('DATE(day_weekend) as date'), DB::raw('sum(total_amount) as total'))
                ->groupBy('date')
                ->get();

                $payroll_day_weekends = $payrollData->pluck('date');
                $invoice_day_weekends = $invoiceData->pluck('date');

                $day_weekends = $payroll_day_weekends->merge($invoice_day_weekends);
                $day_weekends = $day_weekends->unique();
                
                $data[] = ['day_weekend', 'Payroll', 'Invoice'];
                foreach($day_weekends as $day_weekend) {

                    $payroll = $payrollData->where('date', $day_weekend)->first();
                    $invoice = $invoiceData->where('date', $day_weekend)->first();

                    $data[] = [
                        $day_weekend, $payroll ? $payroll->total : 0, $invoice ? $invoice->total : 0,
                    ];
                }

                
                $data = json_encode($data);


         return view('home', compact(['employees' , 'clients', 'supervisors', 'shifts', 'bookings', 'timesheets', 'payrolls', 'invoices',
            'data' ]));
        }
       
    }
}
