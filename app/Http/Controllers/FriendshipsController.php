<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class FriendshipsController extends Controller
{
    public function check($id){
        if(Auth::user()->is_friends_with($id)===1){
            return ["status" => "friends"];
        }
        if(Auth::user()->has_pending_friend_requests_from($id)){
            return ["status" => "pending"];
        }
        if(Auth::user()->has_pending_friend_requests_sent_to($id)){
            return ["status" => "waiting"];
        }
        return ["status" => 0];

    }
    public function add_friend($id){
        //sending notifications,emails,broadcasting
        return Auth::user()->add_friend($id);
    }
    public function accept_friend($id){
        //sending notifications,emails,broadcasting
        return Auth::user()->accept_friend($id);
    }
}
