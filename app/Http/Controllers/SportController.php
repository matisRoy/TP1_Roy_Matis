<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSportRequest;
use App\Http\Resources\SportResource;
use App\Models\Sport;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class SportController extends Controller
{

    public function index()
    {
        try
        {
            return SportResource::collection(Sport::all());
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
            return (new SportResource(Sport::findOrFail($id)));
        }
        catch (ModelNotFoundException $ex)
        {

        abort(self::HTTP_NOT_FOUND, 'Sport not found');
    }
        catch(Exception $ex)
        {
            abort(self::HTTP_SERVER_ERROR, 'server error');
        }

    }

    public function store(StoreSportRequest $request)
    {
        try
        {
            $sports = Sport::create($request->validated());
        }
        catch(QueryException $ex)
        {
            abort(self::HTTP_UNPROCESSABLE_ENTITY, 'cannot be created in database');
        }

        return (new SportResource($sports))->response()->setStatusCode(self::HTTP_CREATED);
    }

    public function update(StoreSportRequest $request, string $id)
    {
        try {
            $sport = Sport::findOrFail($id);
            $sport->update($request->validated());
            return (new SportResource($sport))
                ->response()
                ->setStatusCode(self::HTTP_OK);
        } catch (ModelNotFoundException $ex) {
            abort(self::HTTP_NOT_FOUND, 'Sport not found');
        } catch (QueryException $ex) {
            abort(self::HTTP_UNPROCESSABLE_ENTITY, 'Cannot update in database');
        } catch (Exception $ex) {
            abort(self::HTTP_SERVER_ERROR, 'Server error');
        }
    }
}
