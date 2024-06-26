<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;


class StorePostController extends BasePostController
{
    public function index(StoreRequest $request)
    {
        $data =$request->validated();
        $this->service->store($data);

        return redirect()->route('admin.post.index');
    }
}
