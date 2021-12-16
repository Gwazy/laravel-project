@extends('layouts.app')


@section('content')

    @guest
    <div class="jumbotron text-center">
        <h1>Be Sure To Login</h1>
        <p class="lead">Cover is a one-page template for building simple and beautiful home pages. Download, edit the text, and add your own fullscreen background photo to make it your own.</p>
        <p class="lead">
        <a href="#" class="btn btn-primary">Login</a>
        <a href="#" class="btn btn-primary">Register</a>
        </p>
    </div>
    @endguest

    @auth
    <div class="container bg-light pt-3"> 
        <h1 class="text-center mb-5"> Posts </h1>

            @if (count($posts) != 0)
                @foreach($posts as $post) 
                    <div class="container border rounded mt-3">
                        <h2>{{ $post->title }}</h2>
                        <small>Written by {{ $post->user->name }}</small>
                        <span><small> on {{ $post->created_at }}</small></span>
                    </div>
                @endforeach

                <div class="d-flex justify-content-center mt-5">
                    {!! $posts->links() !!}
                </div>

            @else
            <div class = 'center'>
                <h2>No posts found</h2>
            </div>

        @endif
        @endauth

    </div>
@endsection