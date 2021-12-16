@extends('layouts.app')

@section('content')

    @auth
    <div class="container bg-light pt-3"> 
        <h1 class="mb-5">Profile : {{ $user -> name }} </h1>

    </div>
    @endauth

@endsection