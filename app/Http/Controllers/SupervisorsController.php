<?php

namespace App\Http\Controllers;

use App\Models\ClientSupervisor;
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

    public function create($client_id)
    { 
        $supervisors = User::orderby('id','asc')->get();
     
        return view('supervisors.create', compact(['supervisors', 'client_id']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email', 
            'address' => 'required',
        ]);

        $role = Role::where('name', 'supervisor')->first();

        $supervisor = new User;
        $supervisor->name = $request->name;
        $supervisor->email = $request->email;
        $supervisor->address = $request->address;
        $supervisor->password = Hash::make($request->password);
        $supervisor->role = $role->id;
        $supervisor->save();


        $client_supervisor = new ClientSupervisor;
        $client_supervisor->client_id = $request->client_id;
        $client_supervisor->supervisor_id = $supervisor->id;
        $client_supervisor->save();

        return redirect()->route('clients.edit', $request->client_id)->with('message', 'Supervisor added successfully!');

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

        $supervisor = User::find($id);
        $supervisor->name = $request->name;
        $supervisor->email = $request->email;
        $supervisor->address = $request->address;
        $supervisor->save();

        $client_id = $supervisor->client->client_id;
        
        return redirect()->route('clients.edit', $client_id)->with('message', 'Supervisor updated successfully!');
        
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





                                                           