<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginform ()  {
        return view("login");

    }

    public function login (Request $request)  {
        $array=["email"=> $request->email , "password"=>$request->password];
        if (Auth::attempt($array)) {
            $request->session()->regenerate();
            return redirect()->route("Posts.index");
        }

        else{
            return back();
        }



        }

        public function logout (Request $request){
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route("login");
        }
}
