@extends('layouts.app')

@section('title')
    Post
@endsection    


@section('content')
    <p>The posts</p>
    <ul>
        <li>Title: {{ $post->title }}</li>
        <li>Body: {{ $post->post }}</li>
        <li>Creator: {{ $post->user->name }}
    </ul>
@endsection