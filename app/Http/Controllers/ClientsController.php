<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Supervisor;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientsController extends Controller
{
    public function index()
    {
        $clients = User::where('role', '3')->get();
        return view('clients.index', compact('clients'));
    }

    public function create()
    { 
      $clients = User::orderby('id','asc')->get();
      
        return view('clients.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email', 
            'address' => 'required',           
                    
        ]);

        $role = Role::where('name', 'client')->first();

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->role = $role->id;

        $user->save();

        return redirect()->route('clients')->with('message', 'Client added successfully!');
    }

    public function edit(User $client)
    {

        $supervisor_ids = $client->supervisors->pluck('supervisor_id');

        $supervisors = User::where('role', '4')->whereIn('id', $supervisor_ids)->get();

        return view('clients.edit',compact(['client', 'supervisors']));
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
        
        return redirect()->route('clients')->with('message', 'Client updated successfully!');
        
    }

    public function destroy(User $client)
    {

        $client->delete();

        return response([
            'status' => 'success',
            'message' => 'Client deleted successfully!'
        ], 200);
    }
}
