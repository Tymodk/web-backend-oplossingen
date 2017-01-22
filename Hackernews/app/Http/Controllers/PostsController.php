<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
     public function index(){  	
     	$posts = Post::all();
    	return view('hackerpages.index', compact('posts'));
    }
    public function instructies(){  	

    	return view('hackerpages.instructies');
    }
    public function show($id){
    	$post = Post::findOrFail($id);

    	return view('hackerpages.show', compact('post'));
    }


}
