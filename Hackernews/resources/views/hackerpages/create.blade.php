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
                <div class="panel-heading">Add article</div>

                <div class="panel-content">               
                        {!! Form::open() !!}

                            <div class="form-group">
                                {!! Form::label('title', 'Title (max. 255 characters')  !!}
                                {!! Form::text('title', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('link', 'URL') !!}
                                {!! Form::text('link', null, ['class' => 'form-control']) !!}
                            </div>   
                            <div class="form-group"> 
                                                                                        
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-plus"></i> Add Article
                                </button>

                            </div>
                            
                            {!! Form::close() !!}            
                </div>
            </div>

        </div>
    </div>
    @endif

@stop