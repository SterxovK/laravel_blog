<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\Comment\UpdateRequest;
use App\Models\Comment;


class UpdatePersonalCommentController extends Controller
{
    public function index(UpdateRequest $request, Comment $comment)
    {
        $data = $request->validated();
        $comment->update($data);
        return redirect()->route('personal.comment.index');
    }
}
