<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;


class IndexPostController extends BasePostController
{
    public function index()
    {
       $posts = Post::all();
       return view('admin.post.index', compact('posts'));
    }
}
