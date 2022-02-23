<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            'email' => 'required|unique:users,email', 
            'address' => 'required',           
                    
        ]);

        $role = Role::where('name', 'employee')->first();

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->role = $role->id;

        $user->save();

        return redirect()->route('employees')->with('message', 'Employee added successfully!');
    }

    public function edit(User $employee)
    {
         return view('employees.edit',compact('employee'));
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
        
        return redirect()->route('employees')->with('message', 'Employee updated successfully!');
        
    }

    public function destroy(User $employee)
    {

        $employee->delete();

        return response([
            'status' => 'success',
            'message' => 'Employee deleted successfully!'
        ], 200);
    }
}
