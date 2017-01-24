@extends('app')

@section('content')
	@if (Auth::guest())
        <h2><a href="/Hackernews/public/home">Log in first!</h2>
    @else
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <!-- Display Validation Errors -->
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops! Something went wrong!</strong>
                <br><br>
                <ul>
                    
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    
                </ul>
            </div>
           @endif


             <div class="breadcrumb">                
                <a href="/hackernews/public">← back to overview</a>
            </div>
            
            <div class="panel panel-default">
                <div class="panel-heading">Edit article
                    <a href="/Hackernews/public/article/delete/{{$post->id}}" class="btn btn-danger btn-xs pull-right">
                                <i class="fa fa-btn fa-trash" title="delete"></i> delete article
                            </a>
                </div>
                @if (Auth::user()->id == $post->user_id)
                <div class="panel-content">               
                        {!! Form::open() !!}

                            <div class="form-group">
                                {!! Form::label('title', 'Title (max. 255 characters')  !!}
                                {!! Form::text('title', $post->title, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('link', 'URL') !!}
                                {!! Form::text('link', $post->link, ['class' => 'form-control']) !!}
                            </div>   
                            <div class="form-group">                                
                                <button type="submit" class="btn btn-default">
                                <i class="fa fa-pencil-square-o"></i> Edit Article
                            </button>                                                     
                            </div>
                            
                            {!! Form::close() !!}            
                </div>
                @else
                <h1>Wrong user!</h1>
                @endif
            </div>

        </div>
    </div>
    @endif

@stop