<?php

namespace App\Http\Controllers;

use App\Http\Resources\EquipmentResource;
use App\Http\Resources\CategoryResource;

use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{

    public function index()
    {
        return EquipmentResource::collection(Equipment::all());
    }


    public function show(string $id)
    {
        return new EquipmentResource(Equipment::find($id));
    }

    public function store(Request $request)
    {
        $sports = Equipment::create($request->all());
        return (new EquipmentResource($sports))->response()->setStatusCode(201);
    }
}
