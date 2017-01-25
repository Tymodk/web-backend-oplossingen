<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;
use App\Comment;
use Request;
use Auth;
use Carbon\Carbon;
class PostsController extends Controller
{
    
    public function instructies(){  	

    	return view('hackerpages.instructies');
    }
    public function show($id){
    	$post = Post::findOrFail($id);
        $post['username'] = $post->user->name;        
        if(Comment::find($post['id'])){
            $post['commentcount'] = $post->comments->count();
        }
        else{$post['commentcount'] = 0;}
        $comments = $post->comments()->get();
        foreach ($comments as $comment){
            $comment['username'] = $comment->user()->get();
            $comment['username'] = $comment['username'][0]['name'];
        }
        
        return view('hackerpages.show', compact('post', 'comments'));
    }

    public function editView($id){
        $post = Post::findOrFail($id);        
        return view('hackerpages.edit', compact('post'));

    }
    public function edit($id, \App\Http\Requests\CreatePostRequest $request){
        $post = Post::findOrFail($id);
        $updatedPost = new Post($request->all());
        $post['title'] = $updatedPost['title'];
        $post['link'] = $updatedPost['link'];
        $post->update();
        $redirect = 'comments/' . $post['id'];     
        return redirect($redirect);

    }


    public function delete($id){
        $post = Post::findOrFail($id);
        if(Auth::user() == $post->user){
            $post->delete();
        }
        return redirect('home');
    }

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

    public function create()
    {        
        return view('hackerpages.create');
    }




    public function store(\App\Http\Requests\CreatePostRequest $request){
        $post = new Post($request->all());
        Auth::user()->posts()->save($post);        
        return redirect('home');
    }
    public function addComment(){
        $request = Request::all();
        $request['user_id'] = Auth::user()->id;

        $comment = Comment::create($request);
        $post = Post::findOrFail($request['post_id']);
        $post->updated_at = Carbon::now();
        $post->save();
        $redirect = 'comments/' . $request['post_id'];     
        return redirect($redirect);
    }

}
