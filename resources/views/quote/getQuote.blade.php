@extends('layouts.app')

@section('content')

    @auth
    <div class="container bg-light pt-3"> 
        <p>{{ $author }}</p>
        <p>{{ $body }}</p>
    </div>
    @endauth

@endsection