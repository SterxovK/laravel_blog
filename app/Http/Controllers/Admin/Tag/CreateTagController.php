<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;


class CreateTagController extends Controller
{
    public function index()
    {
        return view('admin.tag.create');
    }
}
