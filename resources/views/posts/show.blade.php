@extends('layouts.app')

@section('content')

    <div class="container bg-light pt-3"> 
        <h1 class="text-center mb-3"> {{ $post->title }} </h1>
        <p class="text-center mb-2">Written by {{ $post->user->name }} on {{ $post->created_at }}</p>
            <div class="container border rounded border-4 mt-3">
                <p>{{  $post->post  }} </p>
            </div>
        
            <div></div>


            <div class="container">
                <div class = "container align-self-center">
                    @if (count($comments) != 0)
                        @foreach($comments as $comment) 
                            <div class="container border rounded border-4 mt-3">
                                <p>{{ $comment->comment }}</p>
                                <small>Written by {{ $comment->user->name }}</small>
                                <span><small> on {{ $comment->created_at }}</small></span>
                            </div>
                        @endforeach
                    @else
                <div class = "text-center mt-3 pb-3">
                    <h2>No comments found</h2>
                </div>
            </div>
            @endif

    </div>






@endsection