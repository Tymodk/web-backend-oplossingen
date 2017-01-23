@extends('app')

@section('content')
<div class="row">
        <div class="col-md-10 col-md-offset-1">

            
            <div class="panel panel-default">
                <div class="panel-heading">Article overview</div>
                <div class="panel-content">                                
                    <ul class="article-overview">                   
                    @foreach ($posts as $post)
                        <li>
                        <div class="vote">                                                        
                                <div class="form-inline upvote">
                                    <i class="fa fa-btn fa-caret-up upvote" title="You need to be logged in to upvote"></i>                                
                                </div>                        
                       
                                <div class="form-inline upvote">
                                    <i class="fa fa-btn fa-caret-down downvote" title="You need to be logged in to downvote"></i>                                
                                </div>                                 
                        </div>                       
                        <div class="url">                        
                            <a href="{{$post->link}}" class="urlTitle">{{ $post->title }}</a>   
                            @if (Auth::user())
                                @if (Auth::user()->name == $post->username)
                                    <a href="Hackernews/public/article/edit/{{$post->id}}" class="btn btn-primary btn-xs edit-btn">edit</a>
                                @endif
                            @endif                 
                        </div>                         
                        <div class="info">
                            @unless($post->commentcount == 1 )
                                {{ $post->votes }} points  | posted by {{ $post->username }} | <a href="comments/{{$post->id}}">{{ $post->commentcount}} comments </a>
                            @else
                                {{ $post->votes }} points  | posted by {{ $post->username }} | <a href="comments/{{$post->id}}">{{ $post->commentcount}} comment </a>

                            @endunless

                            
                        </div>                    
                        </li> 
                        @endforeach                  
                     </ul>
                </div>

            </div>
        </div>
</div>
	
@stop