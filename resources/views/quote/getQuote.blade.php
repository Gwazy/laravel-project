@extends('layouts.app')

@section('content')

    @auth
    <div class="container bg-light pt-3"> 
    @if(in_array("Funny", Auth::User()->getGroups()))
        <p>{{ $author }}</p>
        <p>{{ $body }}</p>
    </div>
    @endif
    <div class="container bg-light pt-3"> 
    @if(in_array("All", Auth::User()->getGroups()))
    <p>{{ $author2 }}</p>
    <p>{{ $body2 }}</p>
    </div>
    @endif
    @endauth

@endsection