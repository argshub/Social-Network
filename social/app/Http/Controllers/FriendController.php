<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Auth;

class FriendController extends Controller {


    public function getFriends(){
        $requests = Auth::User()->friendRequestPending();
        $request = Auth::User()->friendRequest();
        $friends = Auth::user()->friends();
        return view('friends.index')->with('friends', $friends)->with('request', $request)->with('requests', $requests);
    }

    public function getAdd($username){
        $user  = User::where('username', $username)->first();

        Auth::User()->addFriend($user);

        return redirect()->route('profile.index', ['username' => $username])->with('info', 'friend request send');
    }
    public function getAccept($username){
        $user  = User::where('username', $username)->first();

        Auth::User()->acceptFriendRequest($user);

        return redirect()->route('profile.index', ['username' => $username])->with('info', 'friend request Accepted');
    }


}