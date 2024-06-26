<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\Tag\StoreRequest;
use App\Models\Tag;


class StoreTagController extends Controller
{
    public function index(StoreRequest $request)
    {
        $data =$request->validated();
        Tag::firstOrCreate($data);
        return redirect()->route('admin.tag.index');
    }
}
