<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;
use Request;
use Auth;
class PostsController extends Controller
{
    
    public function instructies(){  	

    	return view('hackerpages.instructies');
    }
    public function show($id){
    	$post = Post::findOrFail($id);
        

    	return view('hackerpages.show', compact('post'));
    }
    public function index()
    {
        $posts = Post::all();        
        foreach ($posts as $post) {
            $post['username'] = User::findOrFail($post['id'])->name; 
            if(Comment::find($post['id'])){
                $post['commentcount'] = Comment::where('post_id', $post['id'])->count();
            }   
        }        
        return view('hackerpages.index', compact('posts'));
    }
    public function create()
    {        
        return view('hackerpages.create');
    }
    public function store(){
        $post = new Post(Request::all());
        Auth::user()->posts()->save($post);        
        return redirect('home');
    }

}
