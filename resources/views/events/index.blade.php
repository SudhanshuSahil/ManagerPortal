@extends('layout.base')

@section('content')
    <h1> Events </h1>
    <hr>
    @if (count($events) > 0)
        @foreach ($events as $event)
            <div class="card p-3 mt-3 mb-3">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <img style="width:100%; max-height:200px;" src="/storage/event_image/{{$event->event_image}}">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <a href="/events/{{$event->id}}">
                            <h3> {{$event->name}}</h3>
                            </a>
                            <small> Written on {{$event->created_at}} by {{$event->user->name }}</small>            
                    </div>
               </div>
            </div>
        @endforeach
        {{ $events->links() }}
    @else
        <p> No Events Found. </p>
    @endif
@endsection