<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Models\Review;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
class ReviewController extends Controller
{

    public function index()
    {
        try
        {
            return ReviewResource::collection(Review::all());
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
            return (new ReviewResource(Review::findOrFail($id)));
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

    public function store(StoreReviewRequest $request)
    {
        try
        {
            $sports = Review::create($request->validated());
        }
        catch(QueryException $ex)
        {
            abort(self::HTTP_UNPROCESSABLE_ENTITY, 'cannot be created in database');
        }

        return (new ReviewResource($sports))->response()->setStatusCode(self::HTTP_CREATED);
    }

    public function update(StoreReviewRequest $request, string $id)
    {
        try {
            $review = Review::findOrFail($id);
            $review->update($request->validated());
            return (new ReviewResource($review))
                ->response()
                ->setStatusCode(self::HTTP_OK);
        } catch (ModelNotFoundException $ex) {
            abort(self::HTTP_NOT_FOUND, 'Review not found');
        } catch (QueryException $ex) {
            abort(self::HTTP_UNPROCESSABLE_ENTITY, 'Cannot update in database');
        } catch (Exception $ex) {
            abort(self::HTTP_SERVER_ERROR, 'Server error');
        }
    }
}
