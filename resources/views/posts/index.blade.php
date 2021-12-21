@extends('layouts.app')


@section('content')

    @guest
    <div class="container jumbotron text-center mt-5 ">
        <h1><strong>Welcome to Work Speak!</strong></h1>
        <p class="text-center pb-5 pt-4">Welcome to Work Speak! In order to interact with our website, be sure to register and to login! Speak the truth!</p>

        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
        <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
        </p>
    </div>
    @endguest

    @auth
    <div class="container bg-light pt-3"> 
        <h1 class="text-center mb-5"> Posts </h1>

            @if (count($posts) != 0)
                @foreach($posts as $post) 
                    <div class="container border border-5 rounded  mt-3">
                        <a href="{{ route('posts.show', ['id' => $post->id]) }}" class="text-decoration-none text-reset ">
                            <h2 class="h1">{{ $post->title }}</h2>
                            <p>{{  \Illuminate\Support\Str::limit($post->post, 150, '...') }} </p>
                            <small>Written by {{ $post->user->name }} on {{ $post->created_at }}</small>

                        </a>
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