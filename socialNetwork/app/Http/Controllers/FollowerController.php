<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\follower;
use Illuminate\Support\Facades\Auth;



class FollowerController extends Controller
{
    public function addFriend(string $username){
        $follower = new follower();
        $follower->author_id= Auth::user()->id;
        $user = new userController();

        $follower->follower_id = $user->getByUsername($username)->id;
        $follower->save();
        return redirect('/');
    }

    public function showUnfollowed(){

        $userController = new userController();
        $users = $userController->getAllUsers()->where('id','!=', Auth::user()->id);
        $friends = follower::where('author_id', Auth::user()->id)->get();
        if(count($friends)>0){
            foreach($users as $key=>$user){
                foreach($friends as $friend){
                    if($friend->follower_id == $user->id){
                        unset($users[$key]);
                    }
                }
            }
        }
        return json_encode($users);
        // return json_encode(count($friends));
    }

}
