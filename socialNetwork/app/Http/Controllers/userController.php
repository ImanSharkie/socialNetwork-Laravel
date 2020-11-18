<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\post;
use App\Models\like;
use App\Models\comment;
use App\Models\follower;



class userController extends Controller
{
    public function renderUser($username){
        $data = User::get();
        foreach($data as $user){
            if($username == $user->username){
                return view('socialNetworkViews.user',['user'=>$user]);
            }
        }
        return "not found sorry";
    }

    public function showProfile(){
        //$posts = post::whereUser_id(Auth::user()->id);
        $posts = post::all()->filter(function($post){
            return $post->user_id == Auth::user()->id;
        });
        foreach($posts as $post){
            $post->username = $post->user()->get()->first()->username;
            $post->name = $post->user()->get()->first()->name;
            $post->likes = like::wherePost_id($post->id)->count();
            $post->comments = comment::wherePost_id($post->id)->count();
        }
        return view('socialNetworkViews.profile', ['posts' => $posts, 'user' => Auth::user()]);
    }

    public function getByUsername(string $username){
        return User::get()->where('username', '=', $username)->first();

    }

    public function getAllUsers(){
        return User::all();
    }
}
