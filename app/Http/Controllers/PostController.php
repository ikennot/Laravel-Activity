<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //delete
    public function deleting(Post $post){
        if($post['user_id'] === auth()->user()->id){
           $post->delete();
        }

        return redirect('/home');
    }



 
    public function showedit(Post $post){
       return view('Edit', ['post' => $post]);
    }


    //crud create
    public function createPost(Request $req){
        $incomingFields = $req->validate([
            'title'=>'required',
            'body'=>'required'
        ]);
    
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['user_id'] = auth()->id();
        Post::create($incomingFields);
        return redirect('/home');
    }
    
}
