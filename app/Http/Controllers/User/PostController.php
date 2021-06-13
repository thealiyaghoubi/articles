<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function create()
    {
        return view('users.newpost');
    }

    public function store(StorePostRequest $request)
    {
        $data = [
            'body' => $request->input('body'),
            'title' => $request->input('title'),
            'user_id' => Auth::id(),
        ];

        Post::create($data);
        return redirect('/posts');
    }

    public function index()
    {
        $posts = Post::All()->where('user_id', Auth::id());
        return view('users.posts',compact('posts'));
    }

    public function updateCreate(StorePostRequest $request, $id)
    {
        $post = Post::find($id);
        return view('users.update', compact('post'));
    }

    public function updateStore(StorePostRequest $request, $id)
    {
        $post = Post::find($id);
        $inputs = $request->except('_token');
        $post->update($inputs);
        return redirect('/posts');
    }

    public function delete(StorePostRequest $request, $id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/posts');
    }
}
