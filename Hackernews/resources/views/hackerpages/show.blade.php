@extends('app')

@section('content')
	<div class="row">
        <div class="col-md-10 col-md-offset-1">

            
            <div class="breadcrumb">                
                <a href="home">← back to overview</a>
            </div>


            <div class="panel panel-default">
                        <div class="panel-heading clearfix">                            
                        	{{ $post->title}}
                        </div>
                        <div class="panel-content">                                
                        	<div class="vote">
								<div class="form-inline upvote">
									<i class="fa fa-btn fa-caret-up  upvote" title="You need to be logged in to upvote"></i>
                        	    </div>
								<div class="form-inline upvote">
									<i class="fa fa-btn fa-caret-down  downvote" title="You need to be logged in to downvote"></i>
                        	    </div>
							</div>
						</div>
         </div>

    </div>


@stop