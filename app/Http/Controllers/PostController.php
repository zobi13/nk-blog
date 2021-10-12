<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\CreatePostRequst;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::unpublished()->get();

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post) // ovde treba da stoji model Post. naci nacin da se odradi dovlacenje komentara na samom modelu
    {
        // if($post->is_published) {
        //     throw new ModelNotFoundException;  ovo treba biti otkomentarisano
        // }
        $post->load(['comments']);
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(CreatePostRequst $request)
    {
        // $post = new Post;
        // $post->title = $request->get('title');
        // $post->body = $request->get('body');
        // $post->is_published = $request->get('is_published', false);
        // $post->save();
        // Stari nacin za upisivanje u bazu

        // $data = $request->validate([
        //     'title' => 'required|string|max:255|unique:posts',
        //     'body' => 'required|string|max:1000',
        //     'is_published' => 'sometimes'
        // ]);
        // Stariji nacin za validiranje podataka koji se upisuju

        $data = $request->validated(); // Noviji nacin za validaciju

        $newPost = Post::create($data);
        //Noviji nacin za upis u bazu

        return redirect('/posts');
    }
}
