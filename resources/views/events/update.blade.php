@extends('layout.base')

@section('content')
    <h1> Update Event </h1>
    <hr>
    {!! Form::open(['action' => ['EventsController@update', $event->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data' ]) !!}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', $event -> name, ['class' => 'form-control', 'placeholder' => 'name'])}}
        </div>
        <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::textarea('description', $event -> description, ['class' => 'form-control', 'placeholder' => 'Description'])}}
        </div>
        <div class="form-group">
            {{Form::label('venue', 'Venue')}}
            {{Form::text('venue', $event->venue, ['class' => 'form-control', 'placeholder' => 'Venue'])}}
        </div>

        <div class="form-group">
            {{Form::file('event_image')}}
        </div>

        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
  
@endsection