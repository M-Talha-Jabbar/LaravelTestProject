<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Website;
use App\Models\Account;
use App\Events\NewPostPublished;

class PostController extends Controller
{
    public function store(Request $request, Website $website)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:accounts,user_id',
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        $post = new Post();
        $post->title = $validatedData['title'];
        $post->description = $validatedData['description'];
        $post->user_id = $validatedData['user_id'];

        $website->posts()->save($post);

        event(new NewPostPublished($post));

        return response()->json(['message' => 'Post created successfully'], 201);
    }
}
