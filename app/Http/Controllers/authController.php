<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class authController extends Controller
{



    function login(){

        return view('login');
        
    }



    function register(){

        return view('registration');

    }

    

    function loginPost(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $information = $request->only('email','password');
        if(Auth::attempt($information)){
            return redirect()->intended(route('home')); 
        }
            return redirect(route('login'))-> with("error","Login details are not valied!");
    }




    function registerPost(Request $regPost){

        $regPost->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'name' => 'required'
        ]);

        $data['name'] = $regPost -> name;
        $data['email'] = $regPost -> email;
        $data['password'] = Hash::make ($regPost -> password);

        $user = User::create($data); 
        // User is model name
        if(!$user){

            return redirect(route('register'))-> with("error","Registration Failed!, Try Again.");

        }

            return redirect(route('login'))-> with("success","Registration Succussfuly Completed. Please Login to App");

    }


    function logout(){

        Session::flush();
        Auth::logout();
        return redirect(route('login'));

    }

}
