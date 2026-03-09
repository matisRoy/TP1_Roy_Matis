<?php

namespace App\Http\Controllers;

use App\Http\Resources\SportResource;
use App\Models\Sport;
use Illuminate\Http\Request;

class SportController extends Controller
{

    public function index()
    {
        return SportResource::collection(Sport::all());
    }


    public function show(string $id)
    {
        return new SportResource(Sport::find($id));
    }

    public function store(Request $request)
    {
        $sports = Sport::create($request->all());
        return (new SportResource($sports))->response()->setStatusCode(201);
    }
}
