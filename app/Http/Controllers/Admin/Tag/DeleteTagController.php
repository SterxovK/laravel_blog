<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;


class DeleteTagController extends Controller
{
    public function index(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tag.index');
    }
}
