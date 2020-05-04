<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(RegisterRequest $request)
    {
        return new UserResource(User::create($request->all()));
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function index()
    {
        return UserResource::collection(User::all()->sortDesc());
    }
}
