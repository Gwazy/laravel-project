@extends('layouts.app')


@section('content')
    <h1> Posts </h1>

    @if (count($posts) != 0)
        @foreach($posts as $post) 
            <div>
                <h2>{{ $post->title }}</h2>
            </div>
        @endforeach
    @else
        <div>
            <h2>No posts found</h2>
        </div>
    @endif
@endsection