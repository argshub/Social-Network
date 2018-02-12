<?php

namespace App\Http\Controllers;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;


class ProfileController extends Controller {

    public function getProfile($username){

        $user = User::where('username', $username)->first();
        if(!$user){
            abort(404);
        }
        $statuses = $user->statuses()->notReply()->get();
        return view('profile.index')->with('user', $user)->with('statuses', $statuses)->with('authUserIsFriend', Auth::User()->isFriendWith($user));
    }

    public function getEdit($id){
        $user = User::where('id', $id)->first();
        return view('profile.edit')->with('user', $user);
    }

    public function postEdit(Request $request, $id){
        $user = User::where('id', $id)->first();
        $this->validate($request, [
            'first_name' => 'required|max:32',
            'last_name' => 'required|max:32',
            'password' => 'required|max:32',
            'email' => 'required|unique:users|max:200',
            'location' => 'required|max:200'
        ]);

        Auth::user()->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'password' => bcrypt($request->input('password')),
            'email' => $request->input('email'),
            'location' => $request->input('location'),
        ]);
        return redirect()->route('profile.edit', ['id' => Auth::user()->id])->with('info', 'Profile has been updated');


    }

    public function postDelete($username){
        $user  = User::where('username', $username)->first();

        Auth::User()->deleteFriend($user);
        return redirect()->route('profile.index', ['username' => $user->username])->with('info', 'friend Deleted');
    }
}