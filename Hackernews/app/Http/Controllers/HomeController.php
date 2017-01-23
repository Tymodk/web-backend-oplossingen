<?php

namespace App\Http\Controllers;
use App\Post;
use Auth;
use App\User;
use App\Comment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest('updated_at')->get();
         
        foreach ($posts as $post) {
            $post['username'] = $post->user->name; 
            if(Comment::find($post['id'])){
                $post['commentcount'] = $post->comments->count();
            }   
            else{$post['commentcount'] = 0;}
        }        
        return view('hackerpages.index', compact('posts'));
    }
}
