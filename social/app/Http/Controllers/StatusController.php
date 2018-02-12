<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Status;
use Auth;


class StatusController extends Controller{

    public function postStatus(Request $request){
        $this->validate($request, [
           'status' => 'required'
        ]);

        Auth::User()->statuses()->create([
           'body' => $request->input('status'),
        ]);
        return redirect()->route('home')->with('info', 'Post Posted');
    }

    public function postReply(Request $request, $statusId){
        $this->validate($request, [
            "reply-{$statusId}" => 'required|max:32',
        ], [
           'required' => 'the reply is required'
        ]);

        $status = Status::notReply()->find($statusId);
        if(!$status){
            return redirect()->route('home');
        }

        if(!Auth::User()->isFriendWith($status->user) && Auth::User()->id !== $status->user->id){
            return redirect()->route('home');
        }

        $reply = Status::create([
           'body' => $request->input("reply-{$statusId}")
        ])->user()->associate(Auth::User());

        $status->replies()->save($reply);
        return redirect()->back();
    }

    public function getLike($statusId){
       $status = Status::find($statusId);
        if(!$status){
            return redirect()->route('home')->with('info', 'id not found');
        }

        if(!Auth::User()->isFriendWith($status->user)){
            return redirect()->route('home')->with('info', 'Isnt you friend');
        }

        if(Auth::User()->hasLikedStatus($status)){
            return redirect()->back()->with('info', 'You already liked');
        }
        $like = $status->likes()->create([]);
        Auth::User()->likes()->save($like);
        return redirect()->back();
    }


}