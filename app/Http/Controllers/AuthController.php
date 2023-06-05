<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('auth.login');
    }
    public function login(Request $request){
        $this->validate($request,[
            'email' => 'required|exists:\App\Models\Users,email',
            'password' => 'required'
        ],
            [
                'email.required' => 'E-Mail adresini girmeniz zorunludur!',
                'email.exists' => 'Bu e-mail adresine sahip bir kullanici bulunamadi!',
                'password.required' => 'Parola girmeniz zorunludur!'
            ]
        );

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user_details = Users::where('email',$request->email)->first();
            Auth::login($user_details);

            return response()->json(
                [
                    "status" => 200,
                    "message" => "Giris Yapildi!!"
                ],200
            );
        }
        return response()->json(
            [
                "status" => 403,
                "message" => "Giris Yapilamadi!"
            ],403
        );
    }

    public function registerForm(){
        return view('auth.register');
    }

    public function reset(){
        return view('auth.reset');
    }
    public function resetForm(){
        return view('auth.reset-form');
    }
}
