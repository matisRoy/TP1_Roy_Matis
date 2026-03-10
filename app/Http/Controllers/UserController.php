<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
class UserController extends Controller
{

    public function index()
    {
        try
        {
            return UserResource::collection(User::all());
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
            return (new UserResource(User::findOrFail($id)));
        }
        catch (ModelNotFoundException $ex)
        {

        abort(self::HTTP_NOT_FOUND, 'User not found');
    }
        catch(Exception $ex)
        {
            abort(self::HTTP_SERVER_ERROR, 'server error');
        }
    }

    public function store(StoreUserRequest $request)
    {
       try
        {
            $sports = User::create($request->validated());
        }
        catch(QueryException $ex)
        {
            abort(self::HTTP_UNPROCESSABLE_ENTITY, 'cannot be created in database');
        }

        return (new UserResource($sports))->response()->setStatusCode(self::HTTP_CREATED);
    }

    public function update(StoreUserRequest $request, string $id)
    {
        try {

            $user = User::findOrFail($id);


            $user->update($request->validated());


            return (new UserResource($user))
                ->response()
                ->setStatusCode(self::HTTP_OK);

        } catch (ModelNotFoundException $ex) {

            abort(self::HTTP_NOT_FOUND, 'User not found');
        } catch (QueryException $ex) {
            abort(self::HTTP_UNPROCESSABLE_ENTITY, 'Cannot update in database');
        } catch (Exception $ex) {
            abort(self::HTTP_SERVER_ERROR, 'Server error');
        }
    }
}
