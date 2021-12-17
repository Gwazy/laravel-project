@extends('layouts.app')


@section('content')
    <div class="container bg-light pt-3"> 
        <h1 class="text-center mb-5"> Create</h1>

        <form method="POST" action="">
            @csrf 
            <div class="form-group">
                <p>Title</p>
                <input type="text" name="title" class="form-control" placeholder="Enter title"
                    value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <p>Body</p>
                <input type="textarea" name="description" class="form-control" placeholder="Enter description"
                    value="{{ old('description') }}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Attach image to your post</label>
                <input type="file" name="image" class="form-control-file" value="{{ old('image') }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-danger" href="{{ route('home') }}">Cancel</a>
        </form>
    </div>

@endsection