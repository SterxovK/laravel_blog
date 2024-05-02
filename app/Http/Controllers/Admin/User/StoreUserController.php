<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Jobs\StoreUserJob;
use App\Mail\User\PasswordMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class StoreUserController extends Controller
{
    public function index(StoreRequest $request)
    {
        $data = $request->validated();
        StoreUserJob::dispatch($data);
        return redirect()->route('admin.user.index');
    }
}
