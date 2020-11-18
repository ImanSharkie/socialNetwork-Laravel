<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\post;
use App\Models\user;
use App\Models\comment;
use App\Models\like;
use App\Models\follower;

class homeController extends Controller
{
     public function renderHome(){
        $id = Auth::id();
        $followed = follower::whereAuthor_id($id);
        $posts = post::whereUser_id($id);
        foreach($followed as $followedUser){
            $userPosts = post::whereUser_id($followedUser->id);
            $posts= array_merge($posts, $userPosts);
        }
        $completePosts=array();
        foreach($posts as $post){
            /* Aquí crear una estructura con el post completo */
            /* Author, num Likes, num Comments & description */
            /* Ir añadiendolos en array CompletePosts */

        }
         return view('socialNetworkViews.home', ['posts'=>$completePosts]);
     }
}
