@extends('layout.base')

@section('content')
    <a href="/events" class="btn btn-secondary">Go back</a>
    <h1> {{$event->name}} </h1>
    <small> Written on {{$event->created_at}}</small>
    <hr>
    
    <p> {{$event->description}}

    <hr>
    @if (!Auth::guest())
        @if (Auth::user()->id == $event->user_id)
            
            <a href="/events/{{$event->id}}/edit" class="btn btn-secondary float-right">Edit</a>

            {!! Form::open(['action' => ['EventsController@destroy', $event->id], 'method' => 'DELETE']) !!}
                {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!! Form::close() !!}  

        @endif
    @endif
   
@endsection