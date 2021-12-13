<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(4);
        return view('posts.index', ['posts' => $posts]);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.show', ['post' => $post]);
    }

    public function edit(Request $request, $id)
    {
        $post = Post::findOrFail($id);
    }

    public function destory($userID, $id)
    {
        $post = Post::findOrFail($id);
    }
}
