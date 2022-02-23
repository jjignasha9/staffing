<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SupervisorsController extends Controller
{
    public function index()
    {
        $supervisors = User::where('role', '4')->get();
    }

    public function create()
    { 
      $supervisors = User::orderby('id','asc')->get();
     
        return view('supervisors.create', compact('supervisors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email', 
            'address' => 'required',           
                    
        ]);

        $role = Role::where('name', 'supervisor')->first();

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->role = $role->id;

        $user->save();


    }

    public function edit(User $supervisor)
    {
         return view('supervisors.edit',compact('supervisor'));
    }

    public function update(Request $request, $id)
    {
       $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$id,
            'address' => 'required',           
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->save();
        
        return redirect()->route('supervisors')->with('message', 'Supervisor updated successfully!');
        
    }

    public function destroy(User $supervisor)
    {

        $supervisor->delete();

        return response([
            'status' => 'success',
            'message' => 'Supervisor deleted successfully!'
        ], 200);
    }
}
