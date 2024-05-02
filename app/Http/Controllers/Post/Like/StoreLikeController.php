<?php

namespace App\Http\Controllers\Post\Like;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\Comment\StoreRequest;
use App\Models\Comment;
use App\Models\Post;


class StoreLikeController extends Controller
{
    public function index(Post $post)
    {
        auth()->user()->likedPosts()->toggle($post->id);
        return redirect()->back();
    }
}
