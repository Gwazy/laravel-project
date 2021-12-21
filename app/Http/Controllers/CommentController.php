<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CommentCreated;
use App\Providers\RouteServiceProvider;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {

        $request->validate(([
            'comment' => 'required|max:255',
        ]));

        $post = Post::findOrFail($id);

        Mail::to($post->user->email)->send(new CommentCreated());

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

        if (Auth::id() != $comment->user_id) {
            return "You do not have access to this";
        }

        $comment->user_id = $comment->user_id;
        $comment->post_id = $comment->post_id;
        $comment->comment = $request['comment'];
        $comment->save();

        return redirect()->route('posts.show', ['id' => $comment->post_id]);
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        if ($comment->user->id == Auth::id() || Auth::user()->isAdmin) {
            $comment->delete();
            return redirect(RouteServiceProvider::HOME);
        }
        return redirect(RouteServiceProvider::HOME);
    }
}
