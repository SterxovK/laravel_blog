<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;


class DeletePostController extends BasePostController
{
    public function index(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.post.index');
    }
}
