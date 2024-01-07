<?php

namespace App\Http\Controllers;

use App\Events\SendMessage;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        $data["friends"] = User::whereNot("id_user", auth()->user()->id_user)->get();

        return view("chat", $data);
    }

    public function saveMessage(Request $request)
    {
        $id_room = $request->roomId;
        $message = $request->message;
        $id_user = auth()->user()->id_user;

        broadcast(new SendMessage($id_room, $id_user, $message));

        Message::create([
            'id_room' => $id_room,
            'id_user' => $id_user,
            'text' => $message,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Message success stored'
        ]);
    }

    public function loadMessage($roomId)
    {
        $message = Message::where('id_room', $roomId)->orderBy('updated_at', 'asc')->get();
        return response()->json([
            'success' => true,
            'data' => $message,
        ]);
    }
}
