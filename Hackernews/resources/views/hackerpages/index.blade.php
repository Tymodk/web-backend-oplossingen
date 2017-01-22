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
                        </div>                         
                        <div class="info">
                            1 point  | posted by gasul | <a href="comments/{{$post->id}}">1 comment</a>
                        </div>                    
                        </li> 
                        @endforeach                  
                     </ul>
                </div>

            </div>
        </div>
</div>
	
@stop