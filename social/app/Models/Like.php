<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class like extends Status
{
    protected $table = 'likeable';

    public function likeable(){
        return $this->morphTo();
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'User_id');
    }
}