<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;


class CreateUserController extends Controller
{
    public function index()
    {
        $roles = User::getRoles();
        return view('admin.user.create', compact('roles'));
    }
}
