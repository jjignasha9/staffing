<?php

namespace App\Http\Controllers;

use App\Http\Controllers\InviteController;
use App\Mail\InviteEmail;
use App\Models\InviteUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InviteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invite_users = InviteUser::all();
        return view('invites.index',compact('invite_users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('invites.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required',           
            'email' => 'required',           
                    
        ]);

        $invite_user = new InviteUser;
        $invite_user->name = $request->name;
        $invite_user->email = $request->email;
        $invite_user->save();
        $email = $invite_user->email;
        
        Mail::to($email)->send(new InviteEmail($invite_user));
        return redirect()->route('invites')->with('message', 'User added successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(InviteUser $inviteuser)
    {
        return view('invites.edit',compact('inviteuser'));
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
            'name' => 'required',           
            'email' => 'required',           
                    
        ]);
        $invite_user = InviteUser::find($id);
        $invite_user->name = $request->name;
        $invite_user->email = $request->email;
        $invite_user->save();
        
        $email = $invite_user->email;
        Mail::to($email)->send(new InviteEmail($invite_user));

        return redirect()->route('invites')->with('message', 'User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(InviteUser $inviteuser)
    {
        $inviteuser->delete();
        return response([
            'status' => 'success',
            'message' => 'Invite user deleted successfully!'
        ], 200);
    }
}
