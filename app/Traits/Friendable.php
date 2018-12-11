<?php

namespace App\Traits;
use App\Friendship;

trait Friendable
{
    public function hello(){
        return "Hello Friends";
    }
    public function add_friend($user_requested_id){

        $Friendship=Friendship::create([
            'requester' => $this->id,
            'user_requested' => $user_requested_id
        ]);
        if($Friendship)
        {
            return response()->json($Friendship,200);
        }
        return response()->json('fail',501);
    }
    public function accept_frienf($requester){
        $friendship= Friendship::where('requester',$requester)
                                ->where('user_requested',$this->id)
                                ->first();
        if ($friendship) {
           $friendship->update([
            'status' => 1
           ]);
           return response()->json('ok',200);
        }
        return response()->json('fail',501);
    }
}