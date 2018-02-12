<?php

namespace App\Models;

use App\Models\Status;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'password',
        'email',
        'location'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getName(){
        if($this->first_name && $this->last_name){
            return "{$this->first_name} {$this->last_name}";
        }
    }

    public function getAvatar(){
        return "http://www.gravatar.com/avatar/{{ md5($this->email) }}?d=mm&s=40";
    }

    public function statuses(){
        return $this->hasMany('App\Models\Status', 'user_id');
    }

    public function friendOfMine(){
        return $this->belongsToMany('App\Models\User', 'friends', 'user_id', 'friend_id');
    }

    public function friendOf(){
        return $this->belongsToMany('App\Models\User', 'friends', 'friend_id', 'user_id');
    }

    public function friends(){
        return $this->friendOfMine()->wherePivot('accepted', true)->get()->merge($this->friendOf()->wherePivot('accepted', true)->get());
    }

    public function friendRequest(){
        return $this->friendOfMine()->wherePivot('accepted', false)->get();
    }

    public function friendRequestPending(){
        return $this->friendOf()->wherePivot('accepted', false)->get();
    }

    public function hasFriendRequestPending(User $user){
        return (bool) $this->friendRequestPending()->where('id', $user->id)->count();
    }

    public function hasFriendRequestRecieved(User $user){
        return (bool) $this->friendRequest()->where('id', $user->id)->count();
    }

    public function addFriend(User $user){
        $this->friendOf()->attach($user->id);
    }

    public function acceptFriendRequest(User $user){
        $this->friendRequest()->where('id', $user->id)->first()->pivot->update([
           'accepted' => true,
        ]);
    }

    public function isFriendWith(User $user){
        return (bool) $this->friends()->where('id', $user->id)->count();
    }

    public function deleteFriend(User $user){
        $this->friendOf()->detach($user->id);
    }

    public function likes(){
        return $this->hasMany('App\Models\Like', 'user_id');
    }

    public function haslikedStatus(Status $status){
        return (bool) $status->likes->where('likeable_id', $status->id)->where('likeable_type', get_class($status))->where('user_id', $this->id)->count();
    }


}
