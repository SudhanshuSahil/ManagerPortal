@extends('layout.base')

@section('content')
    <h1> {{$title}} </h1>

    @if (count($array) > 0)
        <ul class="list-group">
            @foreach ($array as $item)
                    <li class="list-group-item">{{$item}}</li>
            @endforeach
        </ul>
    @endif
@endsection