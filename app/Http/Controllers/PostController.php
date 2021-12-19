<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Controllers\ImageController;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{


    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(8);
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

    public function store(Request $request)
    {


        $request->validate(([
            'title' => 'required|max:255',
            'post' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpgeg|max:5000',
        ]));

        $post = new Post;
        $post->user_id = Auth::id();
        $post->title = $request['title'];
        $post->post = $request['post'];
        $post->save();

        if ($request->hasFile('image')) {

            $image_controller = new ImageController;
            $image_controller->store($request['image'], $post->id);
        }

        return redirect(RouteServiceProvider::HOME);
    }

    public function update(Request $request, $id)
    {

        $request->validate(([
            'title' => 'required|max:255',
            'post' => 'required',
        ]));



        $post = Post::findOrFail($id);
        $post->user_id = Auth::id();
        $post->title = $request['title'];
        $post->post = $request['post'];
        $post->save();

        return redirect()->route('posts.show', ['id' => $post->id]);
    }


    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', ['post' => $post]);
    }

    public function destory($id)
    {
        $post = Post::findOrFail($id);
    }
}
