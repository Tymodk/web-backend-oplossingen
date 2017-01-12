@extends('app')
@section('content')

       @if (isset($name))
              <h1>About Page: {{ $name }}</h1>
       @else
              <h1>About page (var not set)</h1>

       @endif
       <h3>People I like</h3>
       @if (count($people))
       <ul>
       	@foreach ($people as $person)
       		<li>{{$person}}</li>
       	@endforeach

       </ul>
       @endif
<p>Lorem ipsum etc etc</p>