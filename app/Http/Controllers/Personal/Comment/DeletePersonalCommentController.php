<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class DeletePersonalCommentController extends Controller
{
    public function index(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('personal.comment.index');
    }
}
