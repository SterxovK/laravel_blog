<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;


class ShowTagController extends Controller
{
    public function index(Tag $tag)
    {

        return view('admin.tag.show', compact('tag'));
    }
}
