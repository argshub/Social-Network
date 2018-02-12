<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;


class AuthController extends Controller {

    public function getSignup(){
        return view('auth.signup');
    }
    public function postSignup(Request $request){
        $this->validate($request, [
           'first_name' => 'required|max:32',
            'last_name' => 'required|max:32',
            'username' => 'required|unique:users|max:32',
            'password' => 'required|min:5',
            'email' => 'required|unique:users|max:32',
            'location' => 'required|max:200'
        ]);
        User::create([
           'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
            'email' => $request->input('email'),
            'location' => $request->input('location'),

        ]);
        return redirect()->route('auth.signin')->with('info', 'You Signed Up');
    }
    public function getSignin(){
        return view('auth.signin');
    }
    public function postSignin(Request $request){
        $this->validate($request, [
            'email' => 'required|max:200',
            'password' => 'required|min:5'

        ]);
        if(!Auth::attempt($request->only('email', 'password'), $request->has('remember'))){
            return redirect()->route('auth.signin')->with('info', 'Inavlid User Information');
        }
        return redirect()->route('home')->with('info', 'You Signed In');
    }

    public function getSignout(){
        Auth::logout();
        return redirect()->route('home')->with('info', 'You Signed Out');
    }

}