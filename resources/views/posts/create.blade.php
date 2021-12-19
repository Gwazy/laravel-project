@extends('layouts.app')


@section('content')
    <div class="container bg-light pt-3"> 
        <h1 class="text-center mb-5"> Create</h1>

        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf 
            <div class="form-group">
                <p>Title</p>
                <input type="text" name="title" class="form-control" placeholder="Enter title"
                    value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <p>Body</p>
                <input type="textarea" name="post" class="form-control" placeholder="Enter description"
                    value="{{ old('post') }}">
            </div>
            <div class="form-group">
                <label>Attach image to your post</label>
                <input type="file" name="image" class="form-control-file" value="{{ old('image') }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-danger" href="{{ route('home') }}">Cancel</a>
        </form>
    </div>

@endsection