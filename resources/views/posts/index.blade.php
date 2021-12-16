@extends('layouts.app')


@section('content')
    <h1> Posts </h1>
    <div class = "container align-self-center">
        @if (count($posts) != 0)
            @foreach($posts as $post) 
                <div class='well'>
                    <h2>{{ $post->title }}</h2>
                    <small>Written by {{ $post->user->name }}</small>
                    <span><small> on {{ $post->created_at }}</small></span>

                </div>
            @endforeach
            <div class="d-inline-flex p-2">
                {{ $posts->links() }}
            </div>
        @else
    <div class = 'center'>
        <h2>No posts found</h2>
    </div>
    @endif


    </div>
@endsection