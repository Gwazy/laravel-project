@extends('layouts.app')

@section('content')

    <div class="container bg-light pt-3"> 
        @if ($post->image) 
            <img src="{{ asset($post->image->image) }}" class="card-img-top">
        @endif
        <h1 class="text-center mb-3"> {{ $post->title }} </h1>
        <p class="text-center mb-2">Written by {{ $post->user->name }} on {{ $post->created_at }}</p>
            <div class="container border-4 mt-3">
                <p>{{  $post->post  }} </p>
            </div>
        
        <div class="container d-flex justify-content-end">
            @if ($post->user->id == Auth::User()->id)
                <div>
                    <button type="submit" class="btn btn-primary">Edit Post</button>
                </div>
            @endif

            @if ($post->user->id == Auth::User()->id || Auth::User()->isAdmin)
            <div>
                <button type="submit" class="btn btn-primary">Delete post</button>
            </div>
            @endif
        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    

        <div class ="container">
            <form method="POST" action="{{ route('comment.store', ['id' => $post->id]) }}">
                @csrf 
                <div class="form-group">
                    <p>Create Comment</p>
                    <input type="text" name="comment" class="form-control" placeholder="Enter comment"
                        value="{{ old('comment') }}">
                </div>

                <div class="container d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Create Comment</button>
                </div>
            </form>
        </div>

            <div class="container">
                <div class = "container align-self-center">
                    @if (count($comments) != 0)
                        @foreach($comments as $comment) 
                            <div class="container border rounded border-4 mt-3">
                                <p>{{ $comment->comment }}</p>
                                <small>Written by {{ $comment->user->name }}</small>
                                <span><small> on {{ $comment->created_at }}</small></span>


                                <div class="container d-flex justify-content-end">
                                    @if ($comment->user->id ==  Auth::User()->id)
                                    <div>
                                        <button type="submit" class="btn btn-primary">Edit</button>
                                    </div>
                                    @endif

                                    @if ($post->user->id ==  Auth::User()->id || Auth::User()->isAdmin)
                                    <div>
                                        <button type="submit" class="btn btn-primary">Delete post</button>
                                    </div>
                                    @endif
                                </div>
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