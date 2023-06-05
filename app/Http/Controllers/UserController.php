<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function all(){
        $users = Users::all();
        return view('user.list',[
            'users' => $users
        ]);
    }
    public function get($product_id){
        $user = Users::findOrFail($product_id);
        return view('user.details',[
            'user' => $user
        ]);
    }
    public function create(){
        return view('user.create');
    }
    public function store(Request $request){
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
    public function edit($user_id){
        $user = Users::findOrFail($user_id);
        return view('user.details',[
            'user' => $user
        ]);
    }
    public function update($user_id,Request $request){
        try {
            $suer = Users::findOrFail($user_id)->update([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'phone' => $request->phone,
                'username' => $request->username,
                'password' => bcrypt($request->password)
            ]);
            return response()->json([
                'status' => 201,
                'message' => 'User Updated!',
            ]);
        }catch (\Illuminate\Database\QueryException $e){
            $data = [
                'status' => 500,
                'message' => $e->errorInfo[2]
            ];
            return $data;
        }
    }
    public function delete($user_id){
        try {
            Users::findOrFail($user_id)->delete();
            return response()->json([
                'status' => 201,
                'message' => 'User Deleted!',
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
