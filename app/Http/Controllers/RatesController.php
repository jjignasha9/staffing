<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rate;
use App\Models\User;
use App\Models\Shift;

class RatesController extends Controller
{
    public function index()
    {
        $rates = Rate::orderby('id','asc')->get();
        return view('rates.index',compact('rates'));
    }

     public function create()
    { 
       
        $clients = User::orderby('id','asc')->where('role','3')->get();
        $employees = User::orderby('id','asc')->where('role','2')->get();
        $shifts = Shift::orderby('id','asc')->get();
     
        return view('rates.create', compact(['clients','employees','shifts']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required',
            'employee_id' => 'required', 
            'shift_id' => 'required',           
            'payrate' => 'required',           
            'billrate' => 'required'          
        ]);

        $rate = new Rate;
        $rate->client_id = $request->client_id;
        $rate->employee_id = $request->employee_id;
        $rate->shift_id = $request->shift_id;
        $rate->pay_rate = $request->payrate;
        $rate->bill_rate = $request->billrate;

        $rate->save();

        return redirect()->route('rates')->with('message', 'Rate added successfully!');
    }

    public function edit(Rate $rate)
    {
        $clients = User::orderby('id','asc')->where('role','3')->get();
        $employees = User::orderby('id','asc')->where('role','2')->get();
        $shifts = Shift::orderby('id','asc')->get();

         return view('rates.edit', compact(['clients','employees','shifts','rate']));
    }

    public function update(Request $request, $id)
    {
       $request->validate([
            'client_id' => 'required',
            'employee_id' => 'required', 
            'shift_id' => 'required',           
            'payrate' => 'required',           
            'billrate' => 'required'          
        ]);

        $rate = Rate::find($id);
        $rate->client_id = $request->client_id;
        $rate->employee_id = $request->employee_id;
        $rate->shift_id = $request->shift_id;
        $rate->pay_rate = $request->payrate;
        $rate->bill_rate = $request->billrate;
        $rate->save();
        
        return redirect()->route('rates')->with('message', 'Rate updated successfully!');
        
    }

    public function destroy(Rate $rate)
    {

        $rate->delete();

        return response([
            'status' => 'success',
            'message' => 'Rate deleted successfully!'
        ], 200);
    }
}
