<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index(){
        $users = Users::all();
        return view('message.list',[
            'users' => $users
        ]);
    }
    public function get($receive_id){
        $message_sender_auth = Messages::where(['sender_id' => Auth::user()->user_id, 'receive_id' => $receive_id])->get();
        $message_sender_receive = Messages::where(['sender_id' => $receive_id, 'receive_id' => Auth::user()->user_id])->get();

        // İki koleksiyonu birleştirme
        $messages = $message_sender_auth->concat($message_sender_receive);

        // `created_at` sütununa göre sıralama
        $messages = $messages->sortBy('created_at');

        return view('message.detail',[
            'messages' => $messages
        ]);
    }

    public function send(Request $request){
        try {
            $user = Users::create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'phone' => $request->phone,
                'username' => $request->username,
                'password' => bcrypt($request->password)
            ]);
            return response()->json([
                'status' => 201,
                'message' => 'User Created!',
            ]);
        }catch (\Illuminate\Database\QueryException $e){
            $data = [
                'status' => 500,
                'message' => $e->errorInfo[2]
            ];
            return $data;
        }
    }
    public function edit($message_id){
        $user = Messages::findOrFail($message_id);
        return view('user.details',[
            'user' => $user
        ]);
    }
    public function update($message_id,Request $request){
        try {
            $suer = Messages::findOrFail($message_id)->update([
                'sender_id' => Auth::user()->user_id,
                'receive_id' => $request->receive_id,
                'message' => $request->message,
            ]);
            return response()->json([
                'status' => 201,
                'message' => 'Message Updated!',
            ]);
        }catch (\Illuminate\Database\QueryException $e){
            $data = [
                'status' => 500,
                'message' => $e->errorInfo[2]
            ];
            return $data;
        }
    }
    public function delete($message_id){
        try {
            Messages::findOrFail($message_id)->delete();
            return response()->json([
                'status' => 201,
                'message' => 'Message Deleted!',
            ]);
        }catch (\Illuminate\Database\QueryException $e){
            $data = [
                'status' => 500,
                'message' => $e->errorInfo[2]
            ];
            return $data;
        }
    }
}
