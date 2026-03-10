<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEquipmentRequest;
use App\Http\Resources\EquipmentResource;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{

    public function index()
    {
        try
        {
            return EquipmentResource::collection(Equipment::all());
        }
        catch(Exception $ex)
        {
            abort(self::HTTP_SERVER_ERROR, 'Server error');
        }
    }


    public function show(string $id)
    {
       try
        {
            return (new EquipmentResource(resource: Equipment::findOrFail($id)));
        }
        catch (ModelNotFoundException $ex)
        {

        abort(self::HTTP_NOT_FOUND, 'Review not found');
        }
        catch(Exception $ex)
        {
            abort(self::HTTP_SERVER_ERROR, 'server error');
        }
    }

    public function store(StoreEquipmentRequest $request)
    {
        try
        {
            $equipment = Equipment::create($request->validated());
        }
        catch(QueryException $ex)
        {
            abort(self::HTTP_UNPROCESSABLE_ENTITY, 'cannot be created in database');
        }

        return (new EquipmentResource($equipment))->response()->setStatusCode(self::HTTP_CREATED);
    }

    public function update(StoreEquipmentRequest $request, string $id)
    {
        try {
            $equipment = Equipment::findOrFail($id);
            $equipment->update($request->validated());
            return (new EquipmentResource($equipment))
                ->response()
                ->setStatusCode(self::HTTP_OK);
        } catch (ModelNotFoundException $ex) {
            abort(self::HTTP_NOT_FOUND, 'Equipment not found');
        } catch (QueryException $ex) {
            abort(self::HTTP_UNPROCESSABLE_ENTITY, 'Cannot update in database');
        } catch (Exception $ex) {
            abort(self::HTTP_SERVER_ERROR, 'Server error');
        }
    }


}
