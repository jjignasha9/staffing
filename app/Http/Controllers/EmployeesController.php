<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index()
    {
        $employees = User::where('role', '2')->get();
     
        return view('employees.index', compact('employees'));
    }

    public function create()
    { 
      $employees = User::orderby('id','asc')->get();
     
        return view('employees.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required', 
            'address' => 'required',           
            'password' => 'required'           
        ]);

        $role = Role::where('name', 'employee')->first();

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->password = $request->password;
        $user->role = $role->id;

        $user->save();

        return redirect()->route('employees.index')->with('success','Employee has been created successfully.');
    }

    public function edit(User $employee)
    {
         return view('employees.edit',compact('employee'));
    }

    public function update(Request $request, $id)
    {
       $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',           
            'password' => 'required'  
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->password = $request->password;
        $user->save();
        return redirect()->route('employees.index')
        ->with('success','Employee Has Been updated successfully');
    }

    public function destroy(User $employee)
    {

         $employee->delete();
         return redirect()->route('employees.index')->with('delete','Employee has been deleted successfully.');
    }
}
