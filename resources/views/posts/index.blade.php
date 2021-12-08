@extends('layouts.app');

@section('title')
    Post
@endsection    


@section('content')
    <p>The posts</p>
    <ul>
            @foreach($posts as $post)
                <li>{{$post -> title  }}
            @endForeach
    </ul>
@endsection