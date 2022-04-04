<?php

namespace App\Http\Controllers;

use App\Mail\InvoiceEmail;
use App\Models\Invoice;
use App\Models\InvoiceItems;
use App\Models\Payroll;
use App\Models\Rate;
use App\Models\Timesheet;
use App\Models\TimesheetStatuses;
use App\Models\User;
use App\Models\Workday;
use Auth;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;
use Symfony\Component\HttpFoundation\Response;

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

        $active_day_weekend = $active_day_weekend ? $active_day_weekend : (isset($day_weekends[0]) ? $day_weekends[0] : null);

        $timesheets = Timesheet::leftJoin('workdays', 'timesheets.id', '=', 'workdays.timesheet_id')
        ->leftJoin('rates', 'workdays.shift_id', '=', 'rates.shift_id')
        ->leftJoin('users as clients', 'timesheets.client_id', '=', 'clients.id')
        ->leftJoin('shifts', 'workdays.shift_id', '=', 'shifts.id')
        ->select([
            'timesheets.id as timesheet_id',
            'timesheets.client_id as client_id',
            'timesheets.day_weekend as day_weekend',
            'timesheets.status_id as status_id',
            'timesheets.is_invoiced as is_invoiced',
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
    public function draftinvoice($active_day_weekend = null)
    {
        $day_weekends = Invoice::where('status_id', invoiceStatusId('pending'))->orderBy('day_weekend', 'DESC')->get()->pluck('day_weekend')->unique();
        /*$day_weekends = Invoice::orderBy('day_weekend', 'DESC')->get()->pluck('day_weekend')->unique();
        $active_day_weekend = $active_day_weekend ? $active_day_weekend : (isset($day_weekends[0]) ? $day_weekends[0] : null);*/

       
            $invoice_data = Invoice::leftJoin('timesheets','invoices.timesheet_id', '=', 'timesheets.id')
            ->leftJoin('users as clients', 'timesheets.client_id', '=', 'clients.id')
            ->leftJoin('users as employees', 'timesheets.employee_id', '=', 'employees.id')
            ->leftJoin('invoice_statuses', 'invoice_statuses.id', '=', 'invoices.status_id')
            ->select([
                'invoices.id as id',
                'clients.name as client_name',
                'employees.name as employee_name',
                'invoices.bill_date as bill_date',    
                'invoices.total_amount as total_amount',    
                'invoice_statuses.name as status_name',    
            ])
            ->whereRaw('timesheets.employee_id = employees.id')
            ->where('invoices.status_id', invoiceStatusId('pending'))
            ->where('timesheets.day_weekend', $active_day_weekend)
            ->get();

    
          return view('invoices.draftinvoice',compact(['day_weekends','active_day_weekend','invoice_data']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Invoice $invoice)
    {
        $day_weekend = $request->day_weekend;
        $timesheets = Timesheet::leftJoin('workdays', 'timesheets.id', '=', 'workdays.timesheet_id')
        ->leftJoin('rates', 'workdays.shift_id', '=', 'rates.shift_id')
        ->leftJoin('users as clients', 'timesheets.client_id', '=', 'clients.id')
        ->leftJoin('shifts', 'workdays.shift_id', '=', 'shifts.id')
        ->select([
            'timesheets.id as timesheet_id',
            'timesheets.client_id as client_id',
            'timesheets.employee_id as employee_id',
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
            $status_id = invoiceStatusId('pending');

            $invoice = new Invoice;
            $invoice->timesheet_id = $timesheet_id;
            $invoice->day_weekend = $workdays[0]->day_weekend;
            $invoice->client_id = $workdays[0]->client_id;
            $invoice->employee_id = $workdays[0]->employee_id;
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
          
            Timesheet::where('id', $timesheet_id)->update(['is_invoiced' => true]);

            $file = $this->createPdf($invoice);
            $invoice->file = $file;
            $invoice->save();   

        }
        
        return redirect()->route('invoices')->with('message', 'Invoice created successfully!');    
        
       
    }   

    public function createPdf(Invoice $invoice)
    { 

        $timesheet = Timesheet::where('id', $invoice->timesheet_id)->first();

        $pdf = PDF::loadView('invoices.invoice-create', compact(['invoice', 'timesheet']));
        $pdf = $pdf->setPaper('a4', 'landscape');
        $save = Storage::put('public/invoices/invoices_'.$invoice->id.'.pdf', $pdf->output());
        return storage::url('invoices/invoices_'.$invoice->id.'.pdf');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        $file = Invoice::all();
        $invoice_detail = Invoice::leftJoin('timesheets','invoices.timesheet_id', '=', 'timesheets.id')
        ->leftJoin('users as clients', 'timesheets.client_id', '=', 'clients.id')
        ->leftJoin('invoice_statuses', 'invoice_statuses.id', '=', 'invoices.status_id')
        ->leftJoin('terms', 'terms.id', '=', 'invoices.terms_id')
        ->select([
            'invoices.id as id',
            'clients.name as client_name',
            'terms.name as term_name',
            'clients.email as client_email',
            'clients.address as client_address',
            'invoices.bill_date as bill_date',    
            'invoices.due_date as due_date',
            'invoice_statuses.name as status_name',    
            'invoices.total_amount as total_amount',
            'timesheets.day_weekend as day_weekend'             
        ])
        ->where('invoices.id', $invoice->id)
        ->get();

        $invoice_items = Invoice::leftJoin('invoice_items','invoices.id', '=', 'invoice_items.invoice_id')
        ->leftJoin('timesheets','invoices.timesheet_id', '=', 'timesheets.id')
        ->leftJoin('users as employees', 'timesheets.employee_id', '=', 'employees.id')
        ->leftJoin('shifts', 'shifts.id', '=', 'invoice_items.shift_id')
        ->select([
            'invoices.id as id',
            'employees.name as employee_name',           
            'shifts.name as shift_name',              
            'invoice_items.bill_rate as bill_rate',              
            'invoice_items.hours as hours',              
            'invoice_items.total_amount as amount',             
        ])
        ->where('invoices.id', $invoice->id)
        ->get()
        ->groupBy('employee_name');
       
        return view('invoices.invoice_details',compact(['invoice','invoice_detail','invoice_items']));

    }


    public function showPdf(Invoice $invoice)
    {
        $file = public_path($invoice->file);
  
        $header = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $invoice->file . '"'
        ];

        return response()->file($file, $header);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sentinvoice($active_day_weekend = null)
    {   
        $day_weekends = Invoice::orderBy('day_weekend', 'DESC')->pluck('day_weekend')->unique();
        $active_day_weekend = $active_day_weekend ? $active_day_weekend : (isset($day_weekends[0]) ? $day_weekends[0] : null); 
         $sentdata_invoices = Invoice::leftJoin('timesheets','invoices.timesheet_id', '=', 'timesheets.id')
        ->leftJoin('users as clients', 'timesheets.client_id', '=', 'clients.id')
        ->leftJoin('users as employees', 'timesheets.employee_id', '=', 'employees.id')
        ->leftJoin('invoice_statuses', 'invoice_statuses.id', '=', 'invoices.status_id')
        ->select([
            'invoices.id as id',
            'clients.name as client_name',
            'employees.name as employee_name',
            'invoices.bill_date as bill_date',    
            'invoice_statuses.name as status_name',    
            'invoices.total_amount as total_amount', 

        ])
        ->where('invoices.status_id',invoiceStatusId('sent'))
        ->where('invoices.day_weekend', $active_day_weekend)
        ->get();
       

        return view('invoices.sentinvoice',compact(['sentdata_invoices', 'day_weekends', 'active_day_weekend']));

       /* $invoices = Invoice::where('day_weekend', $active_day_weekend)
        ->where('status_id', invoiceStatusId('sent'))
        ->get();

        return response($invoices);*/
    /*
        //return response($invoices);
        foreach ($invoices as $invoice) {
            Invoice::where('id', $invoice->id)->update(['status_id' =>invoiceStatusId('sent')]);
         }   

        foreach ($invoices as $invoice) {
          $email = $invoice->client->email; 
          Mail::to($email)->send(new InvoiceEmail($invoice));
        }

        //return redirect()->route('invoices.sent-invoice')->with('message', 'Mail Send successfully!');
         */


    }

    public function sendinvoice($active_day_weekend)
    {   
        $invoices = Invoice::where('day_weekend', $active_day_weekend)
        ->where('status_id', invoiceStatusId('pending'))
        ->get();
        //return response($invoices);
        foreach ($invoices as $invoice) {
            Invoice::where('id', $invoice->id)->update(['status_id' =>invoiceStatusId('sent')]);
         }   
     
        $invoicesent = Invoice::where('status_id', invoiceStatusId('sent'))->get();
    

        foreach ($invoices as $invoice) {
          $email = $invoice->client->email; 
          Mail::to($email)->send(new InvoiceEmail($invoice));
        }
          return redirect()->route('invoices.draft-invoice')->with('message', 'Mail Send successfully!');

    
    }

    public function resendinvoice($active_day_weekend)
    {   
        $invoices = Invoice::where('day_weekend', $active_day_weekend)
        ->where('status_id', invoiceStatusId('sent'))
        ->get();
        //return response($invoices);
        foreach ($invoices as $invoice) {
            Invoice::where('id', $invoice->id)->update(['status_id' =>invoiceStatusId('sent')]);
         }   
     
        $invoicesent = Invoice::where('status_id', invoiceStatusId('sent'))->get();
    

        foreach ($invoices as $invoice) {
          $email = $invoice->client->email; 
          Mail::to($email)->send(new InvoiceEmail($invoice));
        }
         
        return redirect()->route('invoices.sent-invoice')->with('message', 'Mail Send successfully!');
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       /* $invoices = Invoice::where('status_id', invoiceStatusId(1))
        ->get();*/

        dd('here');
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
