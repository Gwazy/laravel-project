@extends('layouts.app')

@section('content')

    @auth
    <div class="container bg-light pt-3"> 
        <p>Hello</p>
    </div>
    @endauth

@endsection