@extends('layouts.app')

@section('title', 'Create Post')


@section('content')
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <p>Title: <input type="text" name="title"></p>
        <p>Body : <input type="text" name="post"></p>
        <a href="{{ route('posts.index') }}">Cancel</a>
    </form>