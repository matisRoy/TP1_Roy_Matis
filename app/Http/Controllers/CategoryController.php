<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        return CategoryResource::collection(Category::all());
    }


    public function show(string $id)
    {
        return new CategoryResource(Category::find($id));
    }

    public function store(Request $request)
    {
        $sports = Category::create($request->all());
        return (new CategoryResource($sports))->response()->setStatusCode(201);
    }
}
