@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3> Dashboard </h3></div>

                

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/events/create" class="btn btn-primary float-right">Create Events</a>
                    <h1>Here are your Events!</h1>

                    <table class="table table-stripped">
                        @foreach ($events as $event)
                            <tr>
                                <td><h5>{{$event -> name}} </h5></td>
                                <td><a href="/events/{{$event->id}}/edit" class="btn btn-secondary">Edit</a> </td>
                                <td>{!! Form::open(['action' => ['EventsController@destroy', $event->id], 'method' => 'DELETE']) !!}
                                    {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                {!! Form::close() !!} </td>
                            </tr>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
