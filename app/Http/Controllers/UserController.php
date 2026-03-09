<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        return UserResource::collection(User::all());
    }


    public function show(string $id)
    {
        return new UserResource(User::find($id));
    }

    public function store(Request $request)
    {
        $sports = User::create($request->all());
        return (new UserResource($sports))->response()->setStatusCode(201);
    }
}
