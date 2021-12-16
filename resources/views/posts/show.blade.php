@extends('layouts.app')

@section('content')
    <div class="container">
        <h1> Post : {{  $post -> title }}</h1>
        <div>
            {{ $post->post }}
        </div>
    </div>


    <div class="container">
        <div class = "container align-self-center">
            @if (count($comments) != 0)
                @foreach($comments as $comment) 
                    <div class='well'>
                        <h2>{{ $comment->comment }}</h2>
                        <small>Written by {{ $comment->user->name }}</small>
                        <span><small> on {{ $comment->created_at }}</small></span>
                    </div>
                @endforeach
            @else
        <div class = 'center'>
            <h2>No comments found</h2>
        </div>
    </div>
    @endif
    </div>
@endsection