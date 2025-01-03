<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Chat;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;



class ChatsController extends Controller
{
    public function index(Request $request)
    { 
       $users = User::leftJoin('chats', 'users.id', 'chats.sender_id')
       ->select('users.id', 'users.name', 'chats.id as message_id', 'chats.created_at')    
       ->where('users.id', '!=', Auth::user()->id)
       ->where('name', 'like', '%'.$request->keyword.'%')
       ->orderBy('chats.created_at', 'desc')
       ->get()
       ->unique();
       
       
       $indicateUsers = Chat::where('receiver_id', Auth::user()->id)->where('is_read', false)->get()->pluck('sender_id');

       $data = [
            'users' => $users,
            'indicate_users' => $indicateUsers,
       ];
       
       return response($data, 200); 
    }

    public function store(Request $request)
    {
        $chat = Chat::create([
            'sender_id' => Auth::user()->id,
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
        ]);

        return response($chat, 200);
    }

    public function show(Request $request)
    { 
       $chats = Chat::orderby('id', 'asc')
            ->where(
               function($query) use ($request) {
                 return $query
                        ->where('sender_id', Auth::user()->id)
                        ->where('receiver_id',  $request->receiver_id);
                }
            )
            ->orWhere(
               function($query) use ($request) {
                 return $query
                        ->where('receiver_id', Auth::user()->id)
                        ->where('sender_id',  $request->receiver_id);
                }
            )
            ->get()
            ->map(function($item) {
                $item['align'] = $item->sender_id == Auth::user()->id ? ' float-right bg-teal-100 rounded-full' : ' float-left';
                $item['date'] = Carbon::parse($item->created_at);
                if($item['date'] <= Carbon::now()->subdays(7)) {
                    $item['date'] = Carbon::parse($item->created_at)->format('m/d/Y');
                } else {
                   $item['date'] = Carbon::parse($item->created_at)->format('l') . '&nbsp;&nbsp;&nbsp;&nbsp;'; 
                }
                

                return $item;
            });

           
            Chat::where('receiver_id', Auth::user()->id)->where('sender_id', $request->receiver_id)->update(['is_read' => true]);
           
            return response($chats, 200); 
    }

    public function notificationSound() 
    {
        $path = storage_path('app/audio/notification.mp3');


        if(!File::exists($path)) abort(404);

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = \Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    
    }

    public function search()
    {
       

      
    }
}
