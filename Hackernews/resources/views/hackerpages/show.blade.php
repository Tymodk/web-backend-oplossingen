@extends('app')

@section('content')
	<div class="row">
        <div class="col-md-10 col-md-offset-1">            
            <div class="breadcrumb">                
                <a href="/Hackernews/public">← back to overview</a>
            </div>     

            
                    <div class="panel panel-default">
                        <div class="panel-heading clearfix">
                            Article: {{$post->title}}
                            @if (Auth::user())
                                @if (Auth::user()->name == $post->username)

                            <a href="/Hackernews/public/article/delete/{{$post->id}}" class="btn btn-danger btn-xs pull-right">
                                <i class="fa fa-btn fa-trash" title="delete"></i> delete article
                            </a>
                                @endif
                            @endif
                        </div>
                            <div class="panel-content">                                
                                 <div class="vote">                                                                                
                                            <div class="form-inline upvote">
                                                <i class="fa fa-btn fa-caret-up disabled upvote" title="You need to be logged in to upvote"></i>
                                            </div>                       
                                            <div class="form-inline upvote">
                                                <i class="fa fa-btn fa-caret-down disabled downvote" title="You need to be logged in to downvote"></i>
                                            </div>                           
                                    </div>                                   
                                    <div class="url">
                                        
                                        

                                        <a href="{{$post->link}}" class="urlTitle">{{$post->title}}</a>
                                        @if (Auth::user())
                                            @if (Auth::user()->name == $post->username)
                                        <a href="/Hackernews/public/article/edit/{{$post->id}}" class="btn btn-primary btn-xs edit-btn">edit</a>
                                            @endif
                                        @endif

                                    </div>                                   
                                    <div class="info">
                                        @unless($post->commentcount == 1 )
                                            {{ $post->votes }} points | posted by {{ $post->username }} | {{ $post->commentcount}} comments
                                        @else
                                            {{ $post->votes }} points | posted by {{ $post->username }} | {{ $post->commentcount}} comment

                                        @endunless
                                    </div>
                                   
                                        <div class="comments">  

                                                    <ul>
                                                         @foreach($comments as $comment)   
                                                         <li>                                                    
                                                            <div class="comment-body">{{$comment->body}}</div>
                                                            <div class="comment-info">
                                                                    Posted by {{$comment->username}} on {{$comment->created_at}}                                                         
                                                            </div>                                                   
                                                         </li>  
                                                         @endforeach
                                                    </ul>
                                                </div>
                                    @if (Auth::guest())
                                    <div>   
                                        <p>You need to be <a href="/Hackernews/public/login">logged in</a> to comment</p>
                                    </div>    
                                    @else
                                        <!-- form here -->
                                        {!! Form::open() !!}                           
                                            <div class="form-group">
                                                {!! Form::label('body', 'Comment', ['class' => 'col-sm-3 control-label']) !!}
                                                
                                                {!! Form::textarea('body', null, ['class' => 'col-sm-3 form-control ']) !!}
                                                
                                            </div>   
                                            <div class="form-group">                                
                                                {!! Form::submit('Add Comment', ['class' => 'btn btn-default']) !!}                                                     
                                            </div>
                                        <input name="post_id" value="{{$post->id}}" type="hidden">
                                        {!! Form::close() !!}              

                                    @endif                           

                                </div>                              
                
                    </div>

            </div>

        </div>


@stop