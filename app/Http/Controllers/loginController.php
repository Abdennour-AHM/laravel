<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    public function show(){
        return view('login.show');
    }

    public function login(Request $req){
        $email=$req->email;
        $password=$req->password;
        $credentials=['email'=>$email,'password'=>$password];

        if(Auth::attempt($credentials)){
            $req->session()->regenerate();
            return to_route('homepage')->with('success','you are loged in successfully');
        }
        else{
            return back()->withErrors([
                'email'=>'email or password incorrect'
            ])->onlyInput("email");
        } 
    }

     public function logout(){
        Session::flush();
        Auth::logout();
        return to_route('login')->with('success', 'You logouted successfully!');
    }
}
