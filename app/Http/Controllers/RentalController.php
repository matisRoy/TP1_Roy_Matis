<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRentalRequest;
use App\Http\Resources\RentalResource;
use App\Models\Rental;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;

class RentalController extends Controller
{

    public function index()
    {
        try
        {
            return RentalResource::collection(Rental::all());
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
            return (new RentalResource(Rental::findOrFail($id)));
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

    public function store(StoreRentalRequest $request)
    {
        try
        {
            $rentals = Rental::create($request->validated());
        }
        catch(QueryException $ex)
        {
            abort(self::HTTP_UNPROCESSABLE_ENTITY, 'cannot be created in database');
        }

        return (new RentalResource($rentals))->response()->setStatusCode(self::HTTP_CREATED);
    }

    public function update(StoreRentalRequest $request, string $id)
    {
        try {
            $rental = Rental::findOrFail($id);
            $rental->update($request->validated());
            return (new RentalResource($rental))
                ->response()
                ->setStatusCode(self::HTTP_OK);
        } catch (ModelNotFoundException $ex) {
            abort(self::HTTP_NOT_FOUND, 'Rental not found');
        } catch (QueryException $ex) {
            abort(self::HTTP_UNPROCESSABLE_ENTITY, 'Cannot update in database');
        } catch (Exception $ex) {
            abort(self::HTTP_SERVER_ERROR, 'Server error');
        }
    }


}
