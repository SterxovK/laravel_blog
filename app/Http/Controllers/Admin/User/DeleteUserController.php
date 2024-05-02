<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;


class DeleteUserController extends Controller
{
    public function index(User $user)
    {
        $user->delete();
        return redirect()->route('admin.user.index');
    }
}
