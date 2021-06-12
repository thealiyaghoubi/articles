<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(StorePostRequest $request)
    {
        $data = [
            'body' => $request->body,
            'title' => $request->title,
            'user_id' => Auth::id(),
        ];
        Post::create($data);
        return response()->json($data, 200);
    }

    public function show()
    {
        $posts = Post::All()->where('user_id', Auth::id());
        return response()->json($posts, 200);
    }

    public function update(StorePostRequest $request, $id)
    {
        $post = Post::find($id);
        $inputs = $request->all();
        if ($post->update($inputs)) {
            return response()->json($post, 200);
        }
    }

    public function delete(StorePostRequest $request, $id)
    {
        $post = Post::find($id);
            if ($post->delete()) {
                return response()->json(null, 204);
            }
    }
}
