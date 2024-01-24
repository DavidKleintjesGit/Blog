<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostCommentsController extends Controller
{
    public function store(Post $post)
    {
        request()->validate([
            'body' => 'required'
        ]);

        $post->comments()->create([
            'post_id' => $post->id,
            'user_id' => auth()->id(),
            'body' => request('body')
        ]);

        $post->save();

        return back()->with('succes', 'Comment posted');
    }
}
