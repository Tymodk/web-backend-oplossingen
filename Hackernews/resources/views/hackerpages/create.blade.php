@extends('app')

@section('content')
	@if (Auth::guest())
        <h2><a href="/Hackernews/public/home">Log in first!</h2>
    @else
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <!-- Display Validation Errors -->
            <!-- resources/views/common/errors.blade.php -->


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
                                {!! Form::submit('Add Article', ['class' => 'btn btn-default']) !!}                                                     
                            </div>
                            
                            {!! Form::close() !!}              

                      
                        
                </div>
            </div>

        </div>
    </div>
    @endif

@stop