<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use App\Models\Status;
use App\Models\User;

class HomeController extends Controller{

    public function index(){
        $users = User::all();
        if(Auth::check()){
            $statuses = Status::notReply()->where(function($query){
               return $query->where('user_id', Auth::User()->id)
                ->orWhereIn('user_id', Auth::User()->friends()->lists('id'));
            })
                ->orderBy('created_at', 'desc')
                ->paginate(5);


            return view('timeline.index')->with('statuses', $statuses)->with('users', $users);
        }
        return view('home');
    }
}