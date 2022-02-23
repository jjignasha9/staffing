<?php

namespace App\Http\Controllers;
use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftsController extends Controller
{
   public function index()
    {
        $shifts = Shift::orderby('id','asc')->get();
        return view('shifts.index',compact('shifts'));
    }

     public function create()
    { 
      return view('shifts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'shifts' => 'required',            
        ]);

      
        $shift = new Shift;
        $shift->shifts = $request->shifts;
        $shift->save();

        return redirect()->route('shifts')->with('message', 'Shift added successfully!');
    }

    public function edit(Shift $shift)
    {
         return view('shifts.edit',compact('shift'));
    }

    public function update(Request $request, $id)
    {
       $request->validate([
            'shifts' => 'required',
                       
        ]);
        $shift = Shift::find($id);
        $shift->shifts = $request->shifts;
        $shift->save();
        
        return redirect()->route('shifts')->with('message', 'Shift updated successfully!');
        
    }

     public function destroy(Shift $shift)
    {

        $shift->delete();

        return response([
            'status' => 'success',
            'message' => 'Shift deleted successfully!'
        ], 200);
    }

}
