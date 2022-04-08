<?php

namespace App\Http\Controllers;

use App\Models\ClientEmployee;
use App\Models\Employee;
use App\Models\EmployeeClient;
use App\Models\InviteUser;
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
        $clients = User::where('role', '3')->get();
        return view('employees.create',compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email', 
            'address' => 'required',           
                    
        ]);

        $role = Role::where('name', 'employee')->first();
        $invite_user = InviteUser::all()->pluck('email');

        if($request->email == $invite_user){
          
            $employee = new User;
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->address = $request->address;
            $employee->password = Hash::make($request->password);
            $employee->role = $role->id;
            $employee->save();

            $client_employee = new ClientEmployee;
            $client_employee->client_id = $request->client_id; 
            $client_employee->employee_id = $employee->id; 
            $client_employee->save();
        } else {
            //dd('same'); 
            InviteUser::where('email', $request->email)->update(['is_registered' => true]);

        }
        

        return redirect()->route('employees')->with('message', 'Employee added successfully!');
    }

    public function edit(User $employee)
    {
        $clients = User::where('role', '3')->get();
        return view('employees.edit',compact(['employee','clients']));
    }

    public function update(Request $request, $id)
    {
       $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$id,
            'address' => 'required',           
        ]);

        $employee = User::find($id);
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->address = $request->address;
        $employee->save();

        $client_employee = ClientEmployee::where('employee_id', $id)->first();
        $client_employee->client_id = $request->client_id; 
        $client_employee->employee_id = $id; 
        $client_employee->save();
        
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
