<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;


class CreateCategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.create');
    }
}
