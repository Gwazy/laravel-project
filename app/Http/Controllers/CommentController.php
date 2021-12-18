<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {

        $request->validate(([
            'comment' => 'required|max:255',
        ]));

        $post = Post::findOrFail($id);

        $comment = new Comment;
        $comment->user_id = Auth::id();
        $comment->post_id = $post->id;
        $comment->comment = $request['comment'];
        $comment->save();

        return redirect()->route('posts.show', ['id' => $post->id]);
    }

    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        return view('comment.edit', ['comment' => $comment]);
    }

    public function update(Request $request, $id)
    {
        $request->validate(([
            'comment' => 'required',
        ]));

        $comment = Comment::findOrFail($id);
        $comment->user_id = Auth::id();
        $comment->post_id = $comment->post_id;
        $comment->comment = $request['comment'];
        $comment->save();

        return redirect()->route('posts.show', ['id' => $comment->post_id]);
    }
}
