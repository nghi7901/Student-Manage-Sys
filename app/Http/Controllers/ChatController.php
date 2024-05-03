<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    //
    public function chat(Request $request){
        $data['title'] = "Chat";

        $sender_id = Auth::user()->id;

        if(!empty($request->receiver_id)){
            $receiver_id = $request->receiver_id;
            if($receiver_id == $sender_id){
                return redirect()->back();
            }
        }
        return view('chat.list', $data);
    }
}
