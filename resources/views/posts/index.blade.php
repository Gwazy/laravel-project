@extends('layouts.app')

@section('title')
    Post
@endsection    


@section('content')
    <p>The posts</p>
    <ul>
            @foreach($posts as $post)
                <li><a href="{{ route('posts.show', [ 'id' => $post->id]) }}"> {{$post -> title}}</a></li>
            @endForeach
    </ul>

@endsection