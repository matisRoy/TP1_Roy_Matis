<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReviewResource;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function index()
    {
        return ReviewResource::collection(Review::all());
    }


    public function store(Request $request)
    {
        $sports = Review::create($request->all());
        return (new ReviewResource($sports))->response()->setStatusCode(201);
    }
}
