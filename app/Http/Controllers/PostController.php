<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::unpublished()->get();

        return view('posts', compact('posts'));
    }

    public function show(Post $post)
    {
        if($post->is_published) {
            throw new ModelNotFoundException;
        }

        return view('post', compact('post'));
    }
}
