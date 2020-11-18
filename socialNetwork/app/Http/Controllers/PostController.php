<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\post;
use App\Models\User;
use App\Models\like;
use App\Models\comment;

class PostController extends Controller
{
    public function createPost(Request $request){
        // validate fields
        $this->validate($request, [
            'description' => ['required', 'string']
        ]);

        $post = new post();
        $post->user_id = Auth::user()->id;
        $post->description = $request->description;
        $post->save();
        //use  ajax if I have time
        return redirect('/');
    }

    public function showPosts(){
        $posts = post::orderBy('created_at', 'desc')->get();
        foreach($posts as $post){
            $post->username = $post->user()->get()->first()->username;
            $post->name = $post->user()->get()->first()->name;
            $post->likes = like::wherePost_id($post->id)->count();
            $post->comments = comment::wherePost_id($post->id)->count();

        }
        return view('socialNetworkViews.home', ['posts' => $posts, 'user' => Auth::user()]);
    }
}
