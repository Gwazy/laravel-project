<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(4);
        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }


    public function show($id)
    {
        $post = Post::findOrFail($id);
        $comments = Comment::where('post_id', $id)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('posts.show', ['post' => $post, 'comments' => $comments]);
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
