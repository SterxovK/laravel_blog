<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;


class ShowCategoryController extends Controller
{
    public function index(Category $category)
    {

        return view('admin.category.show', compact('category'));
    }
}
