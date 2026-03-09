<?php

namespace App\Http\Controllers;

use App\Http\Resources\RentalResource;
use App\Models\Rental;
use Illuminate\Http\Request;

class RentalController extends Controller
{

    public function index()
    {
        return RentalResource::collection(Rental::all());
    }


    public function show(string $id)
    {
        return new RentalResource(Rental::find($id));
    }

    public function store(Request $request)
    {
        $sports = Rental::create($request->all());
        return (new RentalResource($sports))->response()->setStatusCode(201);
    }
}
