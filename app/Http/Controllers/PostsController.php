<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class PostsController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()
                ->filter(request(['category', 'author', 'search']))
                ->with('category', 'author')
                ->paginate(6)->withQueryString()
        ]);
    }
    public function show(Post $post)
    {
        $post->load('comments.user');
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        request()->validate([
            'title' => ['required'],
            'slug' => ['required', 'unique:posts,slug'],
            'thumbnail' => ['required', 'image'],
            'description' => ['required'],
            'body' => ['required'],
            'category_id' => ['required', 'exists:categories,id']
        ]);

        $path = request()->file('thumbnail')->store('thumbnails');

        Post::create([
            'title' => request('title'),
            'slug' => request('slug'),
            'thumbnail' => $path,
            'description' => request('description'),
            'body' => request('body'),
            'category_id' => request('category_id'),
            'user_id' => auth()->id()
        ]);

        return redirect('/posts');
    }

    public function edit()
    {
        return view('posts.edit');
    }

    public function update()
    {
        //
    }

    public function destroy()
    {
        //
    }



}
