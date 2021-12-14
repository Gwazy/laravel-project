@extends('layouts.app')

@section('content')
    <div class="container">
        <h1> Post : {{  $post -> title }}</h1>
        <div>
            {{ $post->post }}
        </div>
    </div>

@endsection