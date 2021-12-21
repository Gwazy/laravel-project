@extends('layouts.app')

@section('content')

    <div class="container bg-light pt-3 m-auto  "> 
        @if ($post->image) 
            <img src="{{ asset($post->image->image) }}" class="img-thumbnail rounded mx-auto d-block ">
        @endif

    
        <h1 class="text-center mb-3"> {{ $post->title }} </h1>

        <p class="text-center mb-5">Written by {{ $post->user->name }} on {{ $post->created_at }}</p>
            <div class="container border-4 mt-3">
                <p class="text-center">{{  $post->post  }} </p>
            </div>
        <div class="container d-flex justify-content-end mt-5 mb-5">
            @if ($post->user->id == Auth::User()->id)
                <div class="mr-1">
                    <a href="{{ route('posts.edit', ['id' => $post->id]) }}" class="btn btn-primary">Edit Post</a>
                </div>
            @endif

            @if ($post->user->id == Auth::User()->id || Auth::User()->isAdmin)
            <div>
                <a href="{{  route('posts.destroy', ['id' => $post->id]) }} " class="btn btn-primary">Delete post</a>
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
    

        <div class ="container mt-3">
            <form method="POST" action="{{ route('comment.store', ['id' => $post->id]) }}">
                @csrf 
                <div class="form-group">
                    <p><strong>Create Comment</strong></p>
                    <input type="text" name="comment" class="form-control"  placeholder="Enter comment "
                        value="{{ old('comment') }}">
                </div>

                <div class="container d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Create Comment</button>
                </div>
            </form>
        </div>

            <div class="container mt-5 pb-5">
                <div class = "container align-self-center">
                    @if (count($comments) != 0)
                        @foreach($comments as $comment) 
                            <div class="container border rounded border-4 mt-3">
                                <p>{{ $comment->comment }}</p>
                                <small>Written by {{ $comment->user->name }}</small>
                                <span><small> on {{ $comment->created_at }}</small></span>


                                <div class="container d-flex justify-content-end mb-1">
                                    @if ($comment->user->id ==  Auth::User()->id)
                                    <div class="mr-1">
                                        <a href="{{ route('comment.edit', ['id' => $comment->id]) }}" class="btn btn-primary">Edit Comment</a>
                                    </div>
                                    @endif

                                    @if ($post->user->id ==  Auth::User()->id || Auth::User()->isAdmin)
                                    <div>
                                        <a href="{{  route('comment.destroy', ['id' => $comment->id]) }} " class="btn btn-primary">Delete Comment</a>
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