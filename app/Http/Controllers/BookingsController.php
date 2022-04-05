<?php

namespace App\Http\Controllers;

use App\Mail\SubmitBookingEmail;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events =array();
        $bookings = Booking::all();
        foreach($bookings as $booking){
            $events[] = [
                'title' => "Employee:  ".$booking->employee->name . "\n" ."Client:  ". $booking->client->name,
                'start' => $booking->start,
                'end' => $booking->end,
                'id' => $booking->id,
                'color' => '#0d9488',

            ];
        }
        $employees = User::where('role','2')->get();
        $clients = User::where('role','3')->get();

        //return response($events);

        return view('bookings.index',compact(['employees','clients','bookings','events']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'employee_id' => 'required',
            'client_id'   => 'required',                             
            'start'  => 'required',                    
            'end'    => 'required',                                                                             
        ]);

        $booking = new Booking;
        $booking->employee_id = $request->employee_id;
        $booking->client_id = $request->client_id;
        $booking->start = $request->start;
        $booking->end = $request->end;  
        $booking->hours = $request->hours;
        $booking->save();

        if($validator->passes()) {
            return response()->json(['success'=>'Employee booked successfully.']);
        }

        return response()->json(['error'=>$validator->errors()->all()]);

        /*$employee_email = User::where('id', $request->employee_id)->pluck('email');
        Mail::to($employee_email)->send(new SubmitBookingEmail($booking));*/


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = Booking::where('id', $id)->get();
        //return response($booking);
        return response($booking, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $booking = Booking::find($id);
        if(! $booking) {
            return response()->json([
                'error' => 'unable to locate  the event'
            ], 404);

        }

        $booking->update([
            'start' =>  $request->start,
            'end' =>  $request->end,
        ]);

        return response()->json('event updated');
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
       
        $request->validate([
            'employee_id' => 'required',
            'client_id'   => 'required',                             
            'start'  => 'required',                    
            'end'    => 'required',                                       
        ]);

        $booking = Booking::find($id);

        $booking->employee_id = $request->employee_id;
        $booking->client_id = $request->client_id;
        $booking->start = $request->start;
        $booking->end = $request->end;
        $booking->hours = $request->hours;
        $booking->save();

        return redirect()->route('bookings')->with('message', 'Employee updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $booking = Booking::find($id);

        $booking->delete();
       
        return response()->json($booking);
    }
}
