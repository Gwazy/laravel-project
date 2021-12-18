@extends('layouts.app')


@section('content')
    <div class="container bg-light pt-3"> 
        <h1 class="text-center mb-5"> Edit Comment</h1>

        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <form method="POST" action=" {{  route('comment.update', ['id' => $comment->id]) }}">
            @csrf 
            <div class="form-group">
                <p>Comment</p>
                <input type="text" name="comment" class="form-control" placeholder="Enter comment"
                    value="{{ $comment->comment }}">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-danger" href="{{ route('home') }}">Cancel</a>
        </form>
    </div>

@endsection