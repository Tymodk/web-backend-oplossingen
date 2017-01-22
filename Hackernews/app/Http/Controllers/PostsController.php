<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;
use App\Comment;
use Request;
use Auth;
class PostsController extends Controller
{
    
    public function instructies(){  	

    	return view('hackerpages.instructies');
    }
    public function show($id){
    	$post = Post::findOrFail($id);
        $post['username'] = User::findOrFail($post['id'])->name;         
        if(Comment::find($post['id'])){
            $post['commentcount'] = Comment::where('post_id', $post['id'])->count();
        }
        else{$post['commentcount'] = 0;}
        $comments = $post->comments()->get();
        foreach ($comments as $comment){
            $comment['username'] = $comment->user()->get();
            $comment['username'] = $comment['username'][0]['name'];
        }
        
        return view('hackerpages.show', compact('post', 'comments'));
    }
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
    public function create()
    {        
        return view('hackerpages.create');
    }



    public function store(){
        $post = new Post(Request::all());
        Auth::user()->posts()->save($post);        
        return redirect('home');
    }
    public function addComment(){
        $request = Request::all();
        $request['user_id'] = Auth::user()->id;
        Comment::create($request);
        $redirect = 'comments/' . $request['post_id'];     
        return redirect($redirect);
    }

}
