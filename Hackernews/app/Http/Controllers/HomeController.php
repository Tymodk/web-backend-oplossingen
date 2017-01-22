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
        $posts = Post::all();
        foreach ($posts as $post) {
            $post['username'] = User::findOrFail($post['id'])->name; 
            if(Comment::find($post['id'])){
                $post['commentcount'] = Comment::where('post_id', $post['id'])->count();
                
            }
            else{$post['commentcount'] = 0;}   
        }     
        return view('hackerpages.index', compact('posts'));
    }
}
